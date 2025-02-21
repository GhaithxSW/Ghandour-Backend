<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Services\Dashboard\ProgressService;
use App\Models\Scene;
use App\Models\LearnedScene;
use App\Models\SupportedScene;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class DashboardController extends Controller
{
    private ProgressService $progressService;

    public function __construct(ProgressService $progressService)
    {
        $this->progressService = $progressService;
    }

    public function home(): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        if (!auth()->check()) {
            return redirect()->route('dashboard.sign-in');
        }

        $totalAchieved = $this->progressService->totalAchieved();
        $totalTime = $this->progressService->totalTime();
        $totalAttempts = $this->progressService->totalAttempts();
        $totalFails = $this->progressService->totalFails();
        $totalTimeInMinutes = $this->progressService->totalTimeInMinutes();

        return view('admin.pages.dashboard', [
            'title' => 'لوحة التحكم',
            'totalAchieved' => $totalAchieved,
            'totalTime' => $totalTime,
            'totalAttempts' => $totalAttempts,
            'totalFails' => $totalFails,
            'totalTimeInMinutes' => $totalTimeInMinutes,
        ]);
    }

    public function todoList(): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        if (!auth()->check()) {
            return redirect()->route('dashboard.sign-in');
        }

        $letterScenes = DB::table('scenes as s')
            ->join('categories as c', 'c.id', '=', 's.category_id')
            ->selectRaw('MIN(s.id) as id, s.name, MIN(s.supported) as supported, MIN(s.learned) as learned')
            ->where('c.name', '=', 'الأحرف')
            ->groupBy('s.name')
            ->orderBy('id')
            ->get();

        $numberScenes = DB::table('scenes as s')
            ->join('categories as c', 'c.id', '=', 's.category_id')
            ->selectRaw('MIN(s.id) as id, s.name, MIN(s.supported) as supported, MIN(s.learned) as learned')
            ->where('c.name', '=', 'الأرقام')
            ->groupBy('s.name')
            ->orderBy('id')
            ->get();

        $mathScenes = DB::table('scenes as s')
            ->join('categories as c', 'c.id', '=', 's.category_id')
            ->selectRaw('MIN(s.id) as id, s.name, MIN(s.supported) as supported, MIN(s.learned) as learned')
            ->where('c.name', '=', 'المفاهيم الرياضية')
            ->groupBy('s.name')
            ->orderBy('id')
            ->get();

        $colorScenes = DB::table('scenes as s')
            ->join('categories as c', 'c.id', '=', 's.category_id')
            ->selectRaw('MIN(s.id) as id, s.name, MIN(s.supported) as supported, MIN(s.learned) as learned')
            ->where('c.name', '=', 'الألوان')
            ->groupBy('s.name')
            ->orderBy('id')
            ->get();

        $fourSeasonsScenes = DB::table('scenes as s')
            ->join('categories as c', 'c.id', '=', 's.category_id')
            ->selectRaw('MIN(s.id) as id, s.name, MIN(s.supported) as supported, MIN(s.learned) as learned')
            ->where('c.name', '=', 'الفصول الأربعة')
            ->groupBy('s.name')
            ->orderBy('id')
            ->get();

        return view('admin.pages.todo-list', ['title' => 'تعزيز المهارات'], [
            'letterScenes' => $letterScenes,
            'numberScenes' => $numberScenes,
            'mathScenes' => $mathScenes,
            'colorScenes' => $colorScenes,
            'fourSeasonsScenes' => $fourSeasonsScenes,
        ]);
    }

    public function addScenesToSupported(Request $request): RedirectResponse
    {
        $request->validate([
            'scenes' => 'required|array',
            'scenes.*' => 'boolean',
        ]);

        foreach ($request->input('scenes') as $sceneId => $isChecked) {
            $scenes = Scene::where('name', Scene::find($sceneId)->name)->get();

            foreach ($scenes as $scene) {
                if ($scene) {
                    $scene->update(['supported' => $isChecked]);
                }
            }
        }

        return redirect()->back()->with('success', 'تم التحديث بنجاح');
    }

    public function supportedGames(): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $user = Auth::user();
        $scenes = Scene::all()
            ->groupBy(fn($scene) => $scene->category->name)
            ->map(fn($sceneGroup) => $sceneGroup->unique('name'));
        $supportedScenes = SupportedScene::where('user_id', $user->id)->pluck('scene_id')->toArray();

        return view('dashboard.supported-games', [
            'scenes' => $scenes,
            'letterScenes' => $scenes['أحرف'] ?? [],
            'wordScenes' => $scenes['كلمات'] ?? [],
            'numberScenes' => $scenes['أرقام'] ?? [],
            'mathScenes' => $scenes['مفاهيم الرياضية'] ?? [],
            'colorScenes' => $scenes['ألوان'] ?? [],
            'fourSeasonsScenes' => $scenes['الفصول الأربعة'] ?? [],
            'complexScenes' => $scenes['مختلطة'] ?? [],
            'fruitScenes' => $scenes['فواكه'] ?? [],
            'animalScenes' => $scenes['حيوانات'] ?? [],
            'vegetableScenes' => $scenes['خضار'] ?? [],
            'supportedScenes' => $supportedScenes,
        ]);
    }

    public function learnedGames(): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $user = Auth::user();
        $scenes = Scene::all()
            ->groupBy(fn($scene) => $scene->category->name)
            ->map(fn($sceneGroup) => $sceneGroup->unique('name'));
        $learnedScenes = LearnedScene::where('user_id', $user->id)->pluck('scene_id')->toArray();

        return view('dashboard.learned-games', [
            'scenes' => $scenes,
            'letterScenes' => $scenes['أحرف'] ?? [],
            'wordScenes' => $scenes['كلمات'] ?? [],
            'numberScenes' => $scenes['أرقام'] ?? [],
            'mathScenes' => $scenes['مفاهيم الرياضية'] ?? [],
            'colorScenes' => $scenes['ألوان'] ?? [],
            'fourSeasonsScenes' => $scenes['الفصول الأربعة'] ?? [],
            'complexScenes' => $scenes['مختلطة'] ?? [],
            'fruitScenes' => $scenes['فواكه'] ?? [],
            'animalScenes' => $scenes['حيوانات'] ?? [],
            'vegetableScenes' => $scenes['خضار'] ?? [],
            'learnedScenes' => $learnedScenes,
        ]);
    }


    public function updateSupportedGames(Request $request): RedirectResponse
    {
        $user = Auth::user();
        SupportedScene::where('user_id', $user->id)->delete();

        if ($request->has('scenes')) {
            foreach ($request->scenes as $sceneId => $isChecked) {
                if ($isChecked) {
                    $scene = Scene::find($sceneId);
                    if ($scene) {
                        $scenesWithSameName = Scene::where('name', $scene->name)->get();
                        foreach ($scenesWithSameName as $sceneWithSameName) {
                            SupportedScene::create(['user_id' => $user->id, 'scene_id' => $sceneWithSameName->id]);
                        }
                    }
                }
            }
        }
        return redirect()->back()->with('success', 'تم تحديث المهارات المدعومة بنجاح.');
    }

    public function updateLearnedGames(Request $request): RedirectResponse
    {
        $user = Auth::user();
        LearnedScene::where('user_id', $user->id)->delete();

        if ($request->has('scenes')) {
            foreach ($request->scenes as $sceneId => $isChecked) {
                if ($isChecked) {
                    $scene = Scene::find($sceneId);
                    if ($scene) {
                        $scenesWithSameName = Scene::where('name', $scene->name)->get();
                        foreach ($scenesWithSameName as $sceneWithSameName) {
                            LearnedScene::create(['user_id' => $user->id, 'scene_id' => $sceneWithSameName->id]);
                        }
                    }
                }
            }
        }
        return redirect()->back()->with('success', 'تم تحديث المهارات المتعلمة بنجاح.');
    }

    public function progress(): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $user = Auth::user();

        $totalAchieved = $this->progressService->totalAchieved();
        $totalTime = $this->progressService->totalTime();
        $totalTimeInMinutes = $this->progressService->totalTimeInMinutes();
        $totalAttempts = $this->progressService->totalAttempts();
        $totalFails = $this->progressService->totalFails();

        // Fetch completed scenes grouped by category
        $categories = [];
        $categoryNames = [];
        $completedScenes = [];
        $timeSpentByCategory = [];

        $scenes = Scene::whereHas('progress', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })->with(['category', 'progress' => function ($query) use ($user) {
            $query->where('user_id', $user->id);
        }])->get();

        foreach ($scenes as $scene) {
            $categoryName = $scene->category->name;

            if (!isset($categories[$categoryName])) {
                $categories[$categoryName] = [];
                $categoryNames[] = $categoryName;
                $completedScenes[$categoryName] = 0;
                $timeSpentByCategory[$categoryName] = 0;
            }

            $progress = $scene->progress->first();

            $startTime = isset($progress->start_time) ? strtotime($progress->start_time) : null;
            $finishTime = isset($progress->finish_time) ? strtotime($progress->finish_time) : null;
            $sceneTimeSpent = ($startTime !== null && $finishTime !== null && $finishTime > $startTime)
                ? $finishTime - $startTime
                : 0;

            // Convert seconds to minutes and seconds format
            $minutes = floor($sceneTimeSpent / 60);
            $seconds = $sceneTimeSpent % 60;
            $formattedTime = sprintf("%02d:%02d", $minutes, $seconds);

            $categories[$categoryName][] = [
                'name' => $scene->name,
                'time_spent' => $formattedTime,
                'attempts' => $progress ? $progress->attempts : 0,
                'failed_attempts' => $progress ? $progress->failed_attempts : 0,
            ];

            // Aggregate data for charts
            $completedScenes[$categoryName] += 1;
            $timeSpentByCategory[$categoryName] += $sceneTimeSpent;
        }

        $attemptsPerCategory = [];
        $categoryAttempts = [];

        foreach ($categories as $categoryName => $scenes) {
            $categoryAttempts[$categoryName] = 0;
            $sceneCount = count($scenes);

            foreach ($scenes as $scene) {
                $categoryAttempts[$categoryName] += $scene['attempts'] ?? 0;
            }

            // Avoid division by zero
            $attemptsPerCategory[$categoryName] = $sceneCount > 0 ? round($categoryAttempts[$categoryName] / $sceneCount, 1) : 0;
        }

        $successfulAttempts = max(0, $totalAttempts - $totalFails);

        return view('dashboard.progress', compact(
            'categories',
            'categoryNames',
            'completedScenes',
            'timeSpentByCategory',
            'totalAchieved',
            'totalTime',
            'totalTimeInMinutes',
            'totalAttempts',
            'totalFails',
            'successfulAttempts',
            'attemptsPerCategory'
        ));
    }

    public function profile(): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $user = Auth::user();
        return view('dashboard.profile', ['title' => 'الملف الشخصي'], ['user' => $user]);
    }

    public function updateProfile(Request $request): RedirectResponse
    {
        DB::beginTransaction();

        try {
            $user = Auth::user();

            $validatedRequest = $request->validate([
                'name' => 'nullable|string|max:255',
                'child_name' => 'nullable|string|max:255',
                'child_age' => 'nullable|string|max:255',
            ]);

            $user->update([
                'name' => $validatedRequest['name'],
                'child_name' => $validatedRequest['child_name'],
                'child_age' => $validatedRequest['child_age'],
            ]);

            DB::commit();

            return redirect()->back()->with('success', 'تم تحديث البيانات بنجاح');
        } catch (Exception $e) {
            DB::rollBack();
            Log::error('User update failed: ' . $e->getMessage());
            return redirect()->back()->with('error', 'حدث خطأ أثناء تحديث البيانات');
        }
    }
}

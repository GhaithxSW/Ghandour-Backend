<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Services\Dashboard\ProgressService;
use App\Models\Scene;
use App\Models\Progress;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    private ProgressService $progressService;

    public function __construct(ProgressService $progressService)
    {
        $this->progressService = $progressService;
    }

    public function home()
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

    public function todoList()
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

    public function addScenesToSupported(Request $request)
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

    public function supportedGames()
    {
        $scenes = Scene::all();
        return view('dashboard.supported-games', compact('scenes'));
    }

    public function learnedGames()
    {
        $scenes = Scene::all();
        return view('dashboard.learned-games', compact('scenes'));
    }

    public function updateSupportedGames(Request $request)
    {
        foreach ($request->scenes as $sceneId => $isSupported) {
            Scene::where('id', $sceneId)->update(['supported' => $isSupported]);
        }
        return redirect()->back()->with('success', 'تم تحديث المهارات المدعومة بنجاح.');
    }

    public function updateLearnedGames(Request $request)
    {
        foreach ($request->scenes as $sceneId => $isLearned) {
            Scene::where('id', $sceneId)->update(['learned' => $isLearned]);
        }
        return redirect()->back()->with('success', 'تم تحديث المهارات المتعلمة بنجاح.');
    }

    public function progress()
    {
        $user = Auth::user();

        $categories = Scene::select('category_id')->distinct()->pluck('category_id');
        $completedScenes = [];
        $timeSpent = [];

        foreach ($categories as $category) {
            $scenes = Scene::where('category_id', $category)->pluck('id');
            $completedScenes[$category] = Progress::whereIn('scene_id', $scenes)->where('user_id', $user->id)->count();
            $timeSpent[$category] = Progress::whereIn('scene_id', $scenes)->where('user_id', $user->id)->sum('finish_time') - Progress::whereIn('scene_id', $scenes)->where('user_id', $user->id)->sum('start_time');
        }

        return view('dashboard.progress', compact('categories', 'completedScenes', 'timeSpent'));
    }
}

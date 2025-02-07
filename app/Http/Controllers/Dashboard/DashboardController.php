<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Services\Dashboard\ProgressService;
use App\Models\Scene;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

        return view('admin.pages.dashboard', ['title' => 'لوحة التحكم'], [
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
            $scene = Scene::find($sceneId);
            if ($scene) {
                $scene->update(['supported' => $isChecked]);
            }
        }

        return redirect()->back()->with('success', 'تم تحديث المشاهد بنجاح');
    }
}

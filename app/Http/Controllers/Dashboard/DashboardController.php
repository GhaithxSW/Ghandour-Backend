<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Services\Dashboard\ProgressService;
use App\Models\Scene;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

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

        $scenes = Scene::all();

        return view('admin.pages.todo-list', ['title' => 'تعزيز المهارات'], ['scenes' => $scenes]);
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

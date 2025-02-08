<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Progress;
use App\Models\Scene;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProgressController extends Controller
{
    /**
     * Save progress when the child finishes a scene.
     */
    public function saveProgress(Request $request)
    {
        // Validate the request
        $request->validate([
            'scene_unity_id' => 'required|integer',
            'attempts' => 'required|integer|min:0',
            'failed_attempts' => 'required|integer|min:0',
            'start_time' => 'required|date_format:Y-m-d\TH:i:s',
            'finish_time' => 'required|date_format:Y-m-d\TH:i:s'
        ]);

        $user = Auth::user();
        if (!$user) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        // Find the scene using scene_unity_id
        $scene = Scene::where('scene_unity_id', $request->scene_unity_id)->first();
        if (!$scene) {
            return response()->json(['error' => 'Scene not found'], 404);
        }

        // Save progress for the user
        $progress = Progress::updateOrCreate(
            ['user_id' => $user->id, 'scene_id' => $scene->id],
            [
                'attempts' => $request->attempts,
                'failed_attempts' => $request->failed_attempts,
                'start_time' => $request->start_time,
                'finish_time' => $request->finish_time
            ]
        );

        return response()->json([
            'message' => 'Progress saved successfully',
            'scene_id' => $scene->id,
            'scene_unity_id' => $scene->scene_unity_id
        ]);
    }

    /**
     * Get the last completed scene for the user.
     */
    public function getLastCompletedScene()
    {
        $user = Auth::user();
        if (!$user) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        // Find the last completed scene
        $lastScene = Progress::where('user_id', $user->id)
            ->orderBy('finish_time', 'desc')
            ->first();

        if (!$lastScene) {
            return response()->json(['error' => 'No completed scenes found'], 404);
        }

        // Get scene details
        $scene = Scene::find($lastScene->scene_id);

        return response()->json([
            'scene_id' => $scene->id,
            'scene_name' => $scene->name,
            'scene_unity_id' => $scene->scene_unity_id
        ]);
    }
}

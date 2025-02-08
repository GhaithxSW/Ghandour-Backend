<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\LearnedScene;
use App\Models\Scene;
use App\Models\SupportedScene;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SceneController extends Controller
{
    public function checkSceneStatus(Request $request): JsonResponse
    {
        $request->validate([
            'sceneId' => 'required|integer'
        ]);

        $user = Auth::user();
        if (!$user) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $scene = Scene::find($request->sceneId);

        if (!$scene) {
            return response()->json(['error' => 'Scene not found'], 404);
        }

        $supportedScenes = SupportedScene::where('scene_id', $scene->id)->pluck('scene_id')->toArray();
        $learnedScenes = LearnedScene::where('scene_id', $scene->id)->pluck('scene_id')->toArray();

        $result = [
            'userId' => $request->user()->id,
            'sceneId' => $scene->id,
            'sceneName' => $scene->name,
            'supported' => in_array($scene->id, $supportedScenes),
            'learned' => in_array($scene->id, $learnedScenes),
        ];

        return response()->json($result, 200);
    }
}

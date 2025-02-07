<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Scene;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SceneController extends Controller
{
    public function checkSceneStatus($sceneUnityId): JsonResponse
    {
        $scene = Scene::where('scene_unity_id', $sceneUnityId)->first();
        $response = ['supported' => $scene->supported = !0, 'learned' => $scene->learned = !0];
        return response()->json($response);
    }
}

<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Scene;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SceneController extends Controller
{
    /**
     * @throws Exception
     */
    public function checkSceneStatus($sceneUnityId): JsonResponse
    {
        try {
            $scene = Scene::where('scene_unity_id', $sceneUnityId)->first();
            if ($scene == null) {
                throw new Exception("Scene $sceneUnityId not found");
            }
            $response = ['supported' => $scene->supported = !0, 'learned' => $scene->learned = !0];
            return response()->json($response);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }
}

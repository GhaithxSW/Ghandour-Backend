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
    public function checkSceneStatus(Request $request): JsonResponse
    {
        try {
            $scene = Scene::where('scene_unity_id', $request->sceneId)->first();
            if ($scene == null) {
                throw new Exception("Scene $request->sceneId not found");
            }
            $response = ['supported' => !($scene->supported == 0), 'learned' => !($scene->learned == 0)];
            return response()->json($response);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }
}

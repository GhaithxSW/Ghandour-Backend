<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Scene;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Spatie\FlareClient\Http\Exceptions\NotFound;

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
                throw new NotFound("Scene $request->sceneId not found");
            }

            $userId = $request->user()->id;

            $response = ['userId' => $userId, 'supported' => !($scene->supported == 0), 'learned' => !($scene->learned == 0)];
            return response()->json($response);
        } catch (NotFound $e) {
            return response()->json(['error' => $e->getMessage()], 404);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}

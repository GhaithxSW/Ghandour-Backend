<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Scene;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SceneController extends Controller
{
    /**
     * Check the scene status for the authenticated user.
     */
    public function checkSceneStatus(Request $request)
    {
        // Validate the request (only check required, remove 'exists' validation)
        $request->validate([
            'scene_id' => 'required|integer'
        ]);

        // Get the authenticated user
        $user = Auth::user();
        if (!$user) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        // Find the scene manually
        $scene = Scene::find($request->scene_id);

        // If scene does not exist, return an error
        if (!$scene) {
            return response()->json(['error' => 'Scene not found'], 404);
        }

        // Return only learned and supported status
        return response()->json([
            'scene_id' => $scene->id,
            'scene_name' => $scene->name,
            'learned' => $scene->learned,
            'supported' => $scene->supported
        ]);
    }
}

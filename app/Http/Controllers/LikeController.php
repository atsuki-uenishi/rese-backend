<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;
use App\Models\Store;
use Illuminate\Support\Facades\DB;

class LikeController extends Controller
{
    public function store(Request $request) {
        $item = Like::create($request->all());
        return response()->json([
            'data' => $item
        ], 201);
    }

    public function destroy(Like $like) {
        $item = Like::where('id', $like->id)->delete();
        if($item) {
            return response()->json([
                'message' => 'お気に入りを解除しました。'
            ], 200);
        } else {
            return response()->json([
                'message' => 'Not found',
            ],404);
        }
    }

    public function getLikes($user_id) {
        $item = Like::where('user_id', $user_id)->with('user')->with('store.area')->with('store.genre')->get();
        return response()->json([
            'data' => $item
        ], 200);
    }
}

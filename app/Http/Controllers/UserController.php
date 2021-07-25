<?php

namespace App\Http\Controllers;

use App\Models\User;



class UserController extends Controller
{
    public function show(User $user) {
        $item = User::where('id', $user->id)->with(['likes', 'reservations'])->first();

        if($item) {
            return response()->json([
                'data' => $item
            ], 200);
        } else {
            return response()->json([
                'message' => 'Not found'
            ], 404);
        }
    }
}

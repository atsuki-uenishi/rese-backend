<?php

namespace App\Http\Controllers;

use App\Models\Store;

class StoreController extends Controller
{
    public function index() {
        $items = Store::with(['area', 'genre', 'likes', 'reservations', 'reviews'])->get();
        return response()->json([
            'data' => $items
        ], 200);
    }

    public function show(Store $store) {
        $item = Store::with(['area', 'genre', 'reservations', 'reviews'])->where('id', $store->id)->first();
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

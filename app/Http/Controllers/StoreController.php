<?php

namespace App\Http\Controllers;

use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class StoreController extends Controller
{
    public function index() {
        $items = Store::with('area')->with('genre')->get();
        return response()->json([
            'data' => $items
        ], 200);
    }

    public function show(Store $store) {
        $item = Store::with('area')->with('genre')->where('id', $store->id)->first();
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

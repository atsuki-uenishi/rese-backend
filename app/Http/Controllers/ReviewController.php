<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index() {
        $items = Review::with(['user', 'store'])->get();
        return response()->json([
            'data' => $items
        ], 200);
    }

    public function store(Request $request) {
        $item = Review::create($request->all());
        return response()->json([
            'data' => $item
        ], 201);
    }

    public function destroy(Review $review) {
        $item = Review::where('id', $review->id)->delete();
        if($item) {
            return response()->json([
                'message' => 'Successfully'
            ], 200);
        } else {
            return response()->json([
                'message' => 'Not found',
            ],404);
        }
    }

    public function update(Request $request, Review $review) {
        $update = [
            'review' => $request->review,
        ];
        $item = Review::where('id', $review->id)->update($update);
        if($item) {
            return response()->json([
                'message' => 'Updated successfully',
            ], 200);
        } else {
            return response()->json([
                'message' => 'Not found'
            ], 404);
        }
    }
}

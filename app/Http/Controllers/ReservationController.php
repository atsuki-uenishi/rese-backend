<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;

class ReservationController extends Controller
{
    public function index() {
        $items = Reservation::with(['user', 'store'])->get();
        return response()->json([
            'data' => $items
        ], 200);
    }

    public function store(Request $request) {
        $item = Reservation::create($request->all());
        return response()->json([
            'data' => $item
        ], 201);
    }

    public function destroy(Reservation $reservation) {
        $item = Reservation::where('id', $reservation->id)->delete();
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

    // public function getReservations($user_id) {
    //     $item = Reservation::where('user_id', $user_id)->with(['user', 'store'])->get();
    //     return response()->json([
    //         'data' => $item
    //     ], 200);
    // }

    public function update(Request $request, Reservation $reservation) {
        $update = [
            'date' => $request->date,
            'time' => $request->time,
            'number' => $request->number
        ];
        $item = Reservation::where('id', $reservation->id)->update($update);
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

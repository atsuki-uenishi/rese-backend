<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use Illuminate\Support\Facades\DB;

class ReservationController extends Controller
{
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
                'message' => '予約を削除しました。'
            ], 200);
        } else {
            return response()->json([
                'message' => 'Not found',
            ],404);
        }
    }

    public function getReservations($user_id) {
        $item = Reservation::where('user_id', $user_id)->with('user')->with('store')->get();
        return response()->json([
            'data' => $item
        ], 200);
    }
}

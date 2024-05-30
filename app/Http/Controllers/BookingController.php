<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RoomPrice;

class BookingController extends Controller
{
    public function showBookingForm()
    {
        $roomPrices = RoomPrice::all();
        return view('book.room', compact('roomPrices'));
    }

    public function bookRoom(Request $request)
    {
        $validated = $request->validate([
            'arrival' => 'required|date',
            'departure' => 'required|date|after_or_equal:arrival',
            'room_price' => 'required|exists:room_prices,id',
        ]);
          // Handle booking logic here (e.g., save to database)

        //   return redirect()->route('book.room')->with('success', 'Room booked successfully!');
        }

}

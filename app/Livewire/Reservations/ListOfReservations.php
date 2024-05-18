<?php

namespace App\Livewire\Reservations;

use App\Models\Reservation;
use App\Models\RoomPrice;
use Barryvdh\DomPDF\Facade\Pdf;
use Livewire\Component;

class ListOfReservations extends Component
{
    public function render()
    {
        return view('livewire.reservations.list-of-reservations', [
            'reservations' => Reservation::where('checkin_date', '=', null)->orderBy('created_at', 'desc')->get(),
        ]);
    }

    public function checkin($id)
    {

        $reservation = Reservation::find($id);
        $reservation->checkin_date = now()->addHours(3);
        $reservation->checkout_date = null;
        $reservation->save();

        noty()->addSuccess('Checked in successfully');
    }

    public function checkout($id)
    {
        $reservation = Reservation::find($id);
        $reservation->checkout_date = now()->addHours(3);
        $reservation->save();

        RoomPrice::where('id', $reservation->room_price_id)->restore();

        noty()->addSuccess('Checked out successfully');
    }

    public function generatePDF($id)
    {

       redirect(route('reservations.print', ['reservation_id' => $id]));

        
    }


}

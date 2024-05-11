<?php

namespace App\Livewire\Reservations;

use App\Models\Reservation;
use Livewire\Component;

class GuestHistory extends Component
{
    public function render()
    {
        return view('livewire.reservations.guest-history', [
            'reservations' => Reservation::where('checkin_date', '!=', null)->where('checkout_date', '!=', null)->orderBy('created_at', 'desc')->get(),
        ]);
    }

    public function generatePDF($id)
    {

        redirect(route('reservations.print', ['reservation_id' => $id]));
    }
}

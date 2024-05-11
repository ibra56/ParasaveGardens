<?php

namespace App\Livewire\Reservations;

use App\Models\Reservation;
use Barryvdh\DomPDF\Facade\Pdf;
use Livewire\Component;

class CurrentGuests extends Component
{
    public function render()
    {
        return view('livewire.reservations.current-guests', [
            'reservations' => Reservation::where('checkin_date', '!=', null)->where('checkout_date', '=', null)->orderBy('created_at', 'desc')->get(),
        ]);
    }

    public function checkout($id)
    {
        $reservation = Reservation::find($id);
        $reservation->checkout_date = now();
        $reservation->save();

        noty()->addSuccess('Checked out successfully');
    }

    public function checkin($id)
    {

        $reservation = Reservation::find($id);
        $reservation->checkin_date = now();
        $reservation->checkout_date = null;
        $reservation->save();

        noty()->addSuccess('Checked in successfully');
    }

    public function generatePDF($id)
    {

        redirect(route('reservations.print', ['reservation_id' => $id]));
    }
}

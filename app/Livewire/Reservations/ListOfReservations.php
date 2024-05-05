<?php

namespace App\Livewire\Reservations;

use App\Models\Reservation;
use Livewire\Component;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

class ListOfReservations extends Component
{
    public function render()
    {
        return view('livewire.reservations.list-of-reservations', [
            'reservations' => Reservation::orderBy('created_at', 'desc')->get(),
        ]);
    }

    public function checkin($id)
    {

        $reservation = Reservation::find($id);
        $reservation->checkin_date = now();
        $reservation->checkout_date = null;
        $reservation->save();

        noty()->addSuccess('Checked in successfully');
    }

    public function checkout($id)
    {
        $reservation = Reservation::find($id);
        $reservation->checkout_date = now();
        $reservation->save();

        noty()->addSuccess('Checked out successfully');
    }

    public function generatePDF()
    {
       
        $pdf = PDF::loadView('livewire.downloads.print-reservation');

        return $pdf->stream('report.pdf', array('Attachment' => 0));    }
}

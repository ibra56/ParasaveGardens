<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class DownloadsController extends Controller
{
    public function printReservation($reservation_id)
    {
        $data = [
            'reservation_id' => $reservation_id,
            'logo' => asset('images/logo.png'),
            'reservation' => Reservation::withTrashed()->findOrFail($reservation_id),
        ];
        $pdf = Pdf::loadView('downloads.PrintReservationReceipt', $data);
        // return view('downloads.PrintReservationReceipt');
        return $pdf->setPaper('a6')->stream();
    }
}

<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class DownloadsController extends Controller
{
    public function printReservation($reservation_id)
    {
        $pdf = Pdf::loadView('downloads.PrintReservationReceipt');

        return $pdf->stream();
    }
}

{{-- <div>
    <!-- People find pleasure in different ways. I find it in keeping my mind clear. - Marcus Aurelius -->

    <div class="grid grid-cols-3 gap-4">
        

        <div class="col-span-3 text-center">
            <div class="text-4xl font-bold">Interconnect Airport Cottages</div>
            <div class="text-xl">Accommodation</div>
            <div class="text-xl">Receipt</div>
        </div>

    </div>
    <hr>
    <div class="grid grid-cols-2 gap-4">
        Guest: {{ $reservation->customer->name }}

        date of reservation: {{ $reservation->reservation_date }}

        checkin date: {{ $reservation->checkin_date }}

        checkout date: {{ $reservation->checkout_date }}


        served by: {{ $reservation->staff->user->name }}
        <hr>
        room : {{ $reservation->roomPrice->room->name }}

        room type: {{ $reservation->roomPrice->room->roomType->name }}

        Rate: USD {{ $reservation->roomPrice->price }}
    </div>
</div> --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receipt</title>
    <style>
        /* Define your CSS styles here */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header h1 {
            font-size: 24px;
            font-weight: bold;
            margin: 5px 0;
        }

        .header p {
            font-size: 16px;
            margin: 5px 0;
        }

        .details {
            margin-bottom: 20px;
        }

        .details p {
            margin: 5px 0;
        }

        .transactions {
            border-collapse: collapse;
            width: 100%;
        }

        .transactions th,
        .transactions td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        .transactions th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>Interconnect Airport Cottages</h1>
            <p>Accommodation</p>
            <p>RID: {{ $reservation->uuid }}</p>
        </div>
        <div class="details">
            <p><strong>Reservation Details:</strong></p>
            <p><strong>Guest:</strong> {{ $reservation->customer->name }}</p>
            <p><strong>Reservation Date:</strong> {{ $reservation->reservation_date ?? 'N/A' }}</p>
            <p><strong>Check-in Date:</strong> {{ $reservation->checkin_date ?? 'N/A' }}</p>
            <p><strong>Check-out Date:</strong> {{ $reservation->checkout_date ?? 'N/A' }}</p>
        </div>
        <div class="details">
            <p><strong>Room Details:</strong></p>
            <p><strong>Room:</strong> {{ $reservation->room->name }}</p>
            <p><strong>Room Type:</strong> {{ $reservation->room->roomType->name }}</p>
            <p><strong>Rate:</strong> {{ $reservation->currency->code }} {{ $reservation->custom_price }}</p>
        </div>
        <div class="transactions">
            <p><strong>Payment Details:</strong></p>
            <table>
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Amount</th>
                        <th>Payment Method</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $totalPayable = $reservation->custom_price;
                    @endphp
                    @forelse ($reservation->transactions as $transaction)
                        <tr>
                            <td>{{ $transaction->transaction_date }}</td>
                            <td>{{ $transaction->payment->currency }} {{ $transaction->payment->amount }}</td>
                            <td>{{ $transaction->payment->payment_method }}</td>
                            @php
                                $totalPayable = $totalPayable - $transaction->payment->amount;
                            @endphp
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3">No payments found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div>
            {{-- <p><strong>Total Payable:</strong> UGX {{ $totalPayable }}</p> --}}
            <p><strong>Total Payable:</strong> {{ $reservation->currency->code }} {{ $totalPayable }}</p>
        </div>
    </div>
</body>

</html>

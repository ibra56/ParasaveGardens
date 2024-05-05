<div class="p-5">
    <div>
        <h2 class="text-xl font-semibold mb-2 text-center">Income Accounts</h2>
        <div class="grid grid-cols-1 gap-4">
            <!-- Calculate and display total amount for each payment method grouped by month -->
            @foreach ($payments->groupBy(function($payment) {
                return $payment->created_at->format('F Y'); // Group by month and year
            }) as $month => $paymentsByMonth)
                <div>
                    <h3 class="text-lg font-semibold">{{ $month }}</h3>
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Period</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Payment Method
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Total Amount (UGX)
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <!-- Calculate and display total amount for each payment method within the month -->
                                @foreach ($paymentsByMonth->groupBy('payment_method')->map->sum('amount') as $method => $total)
                                    <tr>
                                        <!-- Show month in the first column -->
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $month }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $method }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">UGX {{ $total }}</td>
                                    </tr>
                                @endforeach
                                <!-- Display subtotal for the month -->
                                <tr>
                                    <td colspan="2" class="px-6 py-4 whitespace-nowrap text-right font-semibold">Subtotal:</td>
                                    <td class="px-6 py-4 whitespace-nowrap font-semibold">UGX {{ $paymentsByMonth->sum('amount') }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

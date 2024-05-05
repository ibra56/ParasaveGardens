<div class="p-5">
    <div class="mb-4">
        <h2 class="text-xl font-semibold mb-2">Payments List</h2>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead>
                    <tr>
                        <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            Payment ID
                        </th>
                        <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            Customer Name
                        </th>
                        <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            Payment Method
                        </th>
                        <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            Amount
                        </th>
                        <th class="px-6 py-3 bg-gray-50"></th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($payments as $payment)
                        <tr>
                            <td class="px-6 py-4 whitespace-no-wrap">{{ $payment->id }}</td>
                            <td class="px-6 py-4 whitespace-no-wrap">{{ $payment->customer->name }}</td>
                            <td class="px-6 py-4 whitespace-no-wrap">{{ $payment->payment_method }}</td>
                            <td class="px-6 py-4 whitespace-no-wrap">UGX {{ $payment->amount }}</td>
                            <td class="px-6 py-4 whitespace-no-wrap">
                                <!-- Add any action buttons here -->
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>

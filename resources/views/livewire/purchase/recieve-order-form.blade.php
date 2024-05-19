<div class="bg-white shadow overflow-hidden sm:rounded-lg px-4 py-4">
    <div class="px-4 sm:px-6 px-4 mb-2">
        <h3 class="text-lg font-medium leading-6 text-gray-900">Receive Order</h3>
        <p class="mt-1 max-w-2xl text-sm text-gray-500">Order details and received items</p>
    </div>

    @if (session()->has('message'))
        <div class="mb-4 text-green-600">
            {{ session('message') }}
        </div>
    @endif

    <div class="flex items-center justify-between border border-gray-200 p-4">
        <div>
            <h4 class="text-lg font-medium text-gray-900">Order Details</h4>
            <p>Supplier: {{ $po->supplier->name }}</p>
            <p>Reference: {{ $po->supplier_reference }}</p>
            <p>Expected Arrival: {{ $po->expected_arrival_date }}</p>
            <p>Order Deadline: {{ $po->order_deadline_date }}</p>
        </div>
    </div>

    <form wire:submit.prevent="saveReceivedItems" class="p-4">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200 py-4 border border-gray-200">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Product</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ordered Qty</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ordered Unit Price</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ordered Amount</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Received Qty</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Received Unit Price</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Received Amount</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($receivedItems as $index => $item)
                        <tr>
                            <td class="border px-4 py-2">{{ $po->purchaseOrderItems[$index]->product->name }}</td>
                            <td class="border px-4 py-2">{{ $item['quantity'] }}</td>
                            <td class="border px-4 py-2">{{ number_format($item['unit_price'], 2) }}</td>
                            <td class="border px-4 py-2">{{ number_format($item['amount'], 2) }}</td>
                            <td class="border px-4 py-2">
                                <input type="number" step="0.01" wire:model.live.debounce.500ms="receivedItems.{{ $index }}.r_quantity" class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                            </td>
                            <td class="border px-4 py-2">
                                <input type="number" step="0.01" wire:model.live.debounce.500ms="receivedItems.{{ $index }}.r_unit_price" class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                            </td>
                            <td class="border px-4 py-2">{{ number_format($item['r_amount'], 2) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mt-4">Save</button>
    </form>
</div>

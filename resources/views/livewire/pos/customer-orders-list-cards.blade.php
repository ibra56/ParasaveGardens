<div class="p-4" wire:poll>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        @foreach ($customerOrders as $order)
            <div wire:key="posco-{{ $order->id }}" class="bg-white shadow-md rounded-lg p-6">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-semibold">Order #{{ $order->id }}</h3>
                    <span class="text-sm text-gray-500">{{ $order->order_date }}</span>
                </div>
                <div class="mb-4">
                    <p><strong>Customer:</strong> {{ $order->customer->name }}</p>
                    <p><strong>Table Number:</strong> {{ $order->table_number }}</p>
                    {{-- <p><strong>Status:</strong> {{ $order->status }}</p> --}}
                    <p><strong>Total Amount (UGX):</strong> UGX {{ number_format(round($order->total_amount, 2), 2) }}
                    </p>
                    <p><strong>Total Amount (USD):</strong>
                        ${{ number_format(round($order->total_amount / 3850, 2), 2) }}</p>
                </div>
                <div class="flex justify-between items-center space-x-2">
                    @livewire('pos.customer-order-payments-modal', ['order_id' => $order->id], key('c_o_payments-' . $order->id))
                    
                    @livewire('pos.view-customer-order-details', ['order_id' => $order->id], key('v_c_o_details-' . $order->id))


                    <x-button title="print bill" class="bg-indigo-500 hover:bg-indigo-600 text-white"
                        wire:click="printBill({{ $order->id }})">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-printer" viewBox="0 0 16 16">
                            <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1" />
                            <path
                                d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1" />
                        </svg>
                    </x-button>

                    @livewire('pos.add-customer-order-items', ['order_id' => $order->id], key('a_c_o_items-' . $order->id))

                    <x-button title="cancel" class="bg-red-500 hover:bg-red-600 text-white"
                        wire:confirm="cancel order #{{ $order->id }}?"
                        wire:click="cancelOrder({{ $order->id }})">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-x-square" viewBox="0 0 16 16">
                            <path
                                d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z" />
                            <path
                                d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708" />
                        </svg>
                    </x-button>
                </div>
            </div>
        @endforeach
    </div>
</div>

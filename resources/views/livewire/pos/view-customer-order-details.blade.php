
<div>
    <x-button title="details" class="bg-blue-500 hover:bg-blue-600 text-white" wire:click="openOrderDetails">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye"
            viewBox="0 0 16 16">
            <path
                d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z" />
            <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0" />
        </svg>
    </x-button>

    <x-dialog-modal wire:model="isOrderDetailsModalOpen">
        <x-slot name="title">
            Order Details: Order #{{ $order->id }}
        </x-slot>

        <x-slot name="content">
            <div class="grid grid-cols-3 gap-4">
                <div class="col-span-1">
                    Customer: <br>
                    {{ $order->customer->name }}
                </div>
                <div class="col-span-1 text-center">
                    Email: <br>
                    {{ $order->customer->email }}
                </div>
                <div class="col-span-1 text-right">
                    Phone: <br>
                    {{ $order->customer->phone }}
                </div>
                <div class="col-span-1">
                    Table: <br>
                    {{ $order->table_number }}
                </div>
                <div class="col-span-1 text-center">
                    Served By: <br>
                    {{ $order->servedBy ? $order->servedBy->name : 'N/A' }}
                </div>
                <div class="col-span-1 text-right">
                    Total Amount: <br>
                    UGX {{ $order->total_amount }} <br>
                    USD {{ number_format($order->total_amount / 3773, 2) }}
                </div>
                <div class="col-span-3">
                    <hr>
                </div>
                <div class="col-span-3 grid grid-cols-6 gap-4">
                    <div class="col-span-1">Product</div>
                    <div class="col-span-1">Qty.</div>
                    <div class="col-span-1">Unit Price</div>
                    <div class="col-span-1">Amount</div>
                    <div class="col-span-1">Status</div>
                    <div class="col-span-1">Actions</div>
                </div>

                @forelse ($order->items as $item)
                    <div wire:key="oitem-{{$item->id}}" class="col-span-3 grid grid-cols-6 gap-4">
                        <div class="col-span-5 grid grid-cols-5 gap-4">
                            <div class="col-span-1">{{ $item->product->name }}</div>
                            <div class="col-span-1">{{ $item->quantity }}</div>
                            <div class="col-span-1">{{ $item->item_price }}</div>
                            <div class="col-span-1">{{ $item->item_price * $item->quantity }}</div>
                            <div class="col-span-1">{{ $item->preparation_status }}</div>
                        </div>
                        <div class="col-span-1 items-center flex justify-between space-x-2">
                            @if ($item->preparation_status == 'pending')
                                <x-button wire:click="markAsServed({{ $item->id }})" class="bg-yellow-500 hover:bg-yellow-600 text-white" title="Mark as Served">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-lg" viewBox="0 0 16 16">
                                        <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425z"/>
                                    </svg>
                                </x-button>
                                <x-button wire:click="cancelItem({{ $item->id }})" class="bg-red-500 hover:bg-red-600 text-white" title="Cancel Item">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-dash" viewBox="0 0 16 16">
                                        <path d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z"/>
                                    </svg>
                                </x-button>
                            @endif
                            @if ($item->preparation_status == 'served')
                                <x-button class="bg-yellow-500 w-full hover:bg-yellow-600 text-white" disabled title="Already Served">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2-all" viewBox="0 0 16 16">
                                        <path d="M12.354 4.354a.5.5 0 0 0-.708-.708L5 10.293 1.854 7.146a.5.5 0 1 0-.708.708l3.5 3.5a.5.5 0 0 0 .708 0zm-4.208 7-.896-.897.707-.707.543.543 6.646-6.647a.5.5 0 0 1 .708.708l-7 7a.5.5 0 0 1-.708 0z"/>
                                        <path d="m5.354 7.146.896.897-.707.707-.897-.896a.5.5 0 1 1 .708-.708z"/>
                                    </svg>
                                </x-button>
                            @endif
                        </div>
                    </div>
                @empty
                    <div class="col-span-3 text-center">
                        No items were added
                    </div>
                @endforelse
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-button>
                Serve All
            </x-button>
            <x-secondary-button class="mr-3" wire:click="closeOrderDetailsModal">
                Close
            </x-secondary-button>
        </x-slot>
    </x-dialog-modal>
</div>

<div>
    {{-- Nothing in the world is as soft and yielding as water. --}}
    <x-button title="clear bill" class="bg-green-500 hover:bg-green-600 text-white"
        wire:click="openCustomerOrderPaymentsModal">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-credit-card"
            viewBox="0 0 16 16">
            <path
                d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v1h14V4a1 1 0 0 0-1-1zm13 4H1v5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1z" />
            <path d="M2 10a1 1 0 0 1 1-1h1a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1z" />
        </svg>
    </x-button>

    <x-dialog-modal wire:model="isOrderPaymentsModalOpen">
        <x-slot name="title">
            Order Payments: Order #{{ $order->id }}
        </x-slot>

        <x-slot name="content">
            <div class="grid grid-cols-6 gap-4">
                <div class="col-span-3">
                    total Amount Ordered: <br>
                    UGX {{ number_format(round($order->total_amount, 2), 2) }}
                </div>
                <div class="col-span-3">
                    total Amount Served: <br>
                    UGX {{ number_format(round($order->getTotalServedAmountAttribute(), 2), 2) }}
                </div>
                <div class="col-span-3">
                    total Amount Already Paid: <br>
                    UGX {{ number_format(round($order->getTotalPaidAmountAttribute(), 2), 2) }}
                </div>
                <div class="col-span-3">
                    Payable Amount (Ordered - Already Paid): <br>
                    UGX {{ number_format(round($order->total_amount - $order->getTotalPaidAmountAttribute(), 2), 2) }}
                </div>
                {{-- <div class="col-span-3">
                    Payable Amount (Served - Already Paid): <br>
                    {{ number_format(round($order->getTotalServedAmountAttribute() - $order->getTotalPaidAmountAttribute(), 2), 2) }}
                </div> --}}
            </div>

            <form wire:submit.prevent="">
                <div class="grid grid-cols-2 gap-6">
                    <div class="mt-4 col-span-2">
                        <x-label for="newPaymentAmount" value="New Payment Amount (Evaluational)" />
                        <x-input id="newPaymentAmount" class="block mt-1 w-full" type="number"
                            wire:model.live.debounce.500ms="newPaymentAmount" />
                        @error('newPaymentAmount')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    @if ($newPaymentAmount)
                        <div class="mt-4 col-span-2">
                            Payment Change for Ordered: UGX
                            {{ number_format(round($newPaymentAmount - ($order->total_amount - $order->getTotalPaidAmountAttribute()), 2), 2) }}
                        </div>
                        {{-- <div>
                            Payment Change for Served: UGX
                            {{ number_format(round($newPaymentAmount - ($order->getTotalServedAmountAttribute() - $order->getTotalPaidAmountAttribute()), 2), 2) }}
                        </div> --}}

                        <div class="mt-4 col-span-1">
                            <x-label for="paymentMethod" value="Payment Method" />
                            <select id="paymentMethod" class="block mt-1 w-full" wire:model="paymentMethod">
                                <option value="">Choose Payment Method</option>
                                <option value="cash">Cash</option>
                                <option value="card">Card</option>
                                <option value="mobile_money">Mobile Money</option>
                            </select>
                            @error('paymentMethod')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mt-4 col-span-1">
                            <x-label for="newPaymentAmountFin" value="New Payment Amount (Evaluational)" />
                            <x-input id="newPaymentAmountFin" class="block mt-1 w-full" type="number"
                                wire:model.live.debounce.500ms="newPaymentAmountFin" />
                            @error('newPaymentAmountFin')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                    @endif

                </div>
            </form>

        </x-slot>

        <x-slot name="footer">
            {{-- @if ($order->getTotalPaidAmountAttribute() < $order->total_amount)
                <x-button wire:click="addPaymentForOrdered" class="bg-blue-500 hover:bg-blue-600 text-white">Pay for
                    Ordered</x-button>
            @endif

            @if ($order->getTotalPaidAmountAttribute() < $order->getTotalServedAmountAttribute())
                <x-button wire:click="addPaymentForServed" class="bg-blue-500 hover:bg-blue-600 text-white">Pay for
                    Served</x-button>
            @endif --}}
            <span>{{ $newPaymentAmountFin ? number_format(round($newPaymentAmountFin, 2), 2) : '' }}</span>
            <x-button wire:click="savePayment" class="bg-blue-500 ms-2 hover:bg-blue-600 text-white">
                Save Payment
            </x-button>
            <x-secondary-button wire:click="closeCustomerOrderPaymentsModal">Cancel</x-secondary-button>
        </x-slot>
    </x-dialog-modal>
</div>

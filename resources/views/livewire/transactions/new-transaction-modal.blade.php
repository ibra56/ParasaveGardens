<div>
    <x-button class="mr-3" wire:click="openNewTransactionModal" wire:loading.attr="disabled">
        New Transaction
    </x-button>

    <x-dialog-modal wire:model="newTransactionModal_isOpen">
        <x-slot name="title">
            {{ __('New Payment Transaction') }}
        </x-slot>

        <x-slot name="content">
            <x-form-section submit="">
                <x-slot name="title">
                    {{ __('New Payment Transaction') }}
                </x-slot>

                <x-slot name="description">
                    {{ __('Create a new transaction.') }}
                </x-slot>

                <x-slot name="form">
                    <div class="col-span-6 grid grid-cols-12 gap-4">
                        <div class="col-span-12 grid grid-cols-3 gap-4">
                            <div class="col-span-1">
                                <span class="bg-blue-500 text-white py-0.5 px-1 rounded text-xs">
                                    Checkin Date
                                </span><br>
                                {{ $reservation->checkin_date }}
                            </div>

                            @if ($reservation->checkout_date != null)
                                <div class="col-span-1">
                                    <span class="bg-yellow-400 text-gray-900 py-0.5 px-1 rounded text-xs">
                                        Checkout Date
                                    </span> <br>
                                    {{ $reservation->checkout_date }}
                                </div>
                            @else
                                <div class="col-span-1">
                                    <span class="bg-yellow-400 text-gray-900 py-0.5 px-1 rounded text-xs">
                                        Current Date
                                    </span> <br>
                                    {{ Carbon\Carbon::now() }}
                                </div>
                            @endif

                            <div class="col-span-1">
                                <span class="bg-green-400 text-white py-0.5 px-1 rounded text-xs">
                                    Room Price
                                </span>
                                <br>
                                {{ $reservation->currency ? $reservation->currency->code : 'N/A'}}
                                @if ($reservation->custom_price == null)
                                {{ $reservation->roomPrice ? $reservation->roomPrice->price : 'N/A' }}
                                @else
                                {{ $reservation->custom_price ? $reservation->custom_price : 'N/A' }} 
                                @endif
                               

                            </div>

                            @php
                                $checkinDate = Carbon\Carbon::parse($reservation->checkin_date);
                                $checkoutDate = $reservation->checkout_date
                                    ? Carbon\Carbon::parse($reservation->checkout_date)
                                    : Carbon\Carbon::now();
                                $totalDays = $checkoutDate->diffInDays($checkinDate);
                                $totalDays = $totalDays + ($checkoutDate->diffInHours($checkinDate) < 24 ? 1 : 0); // Round up if partial day
                                if ($reservation->custom_price == null)
                                $totalPayable = $totalDays * ($reservation->roomPrice ? $reservation->roomPrice->price : 0);
                                else{
                                    $totalPayable = $totalDays * ($reservation->custom_price ? $reservation->custom_price : 0);
                                }
                                
                                
                                $totalPayments = 0;
                            @endphp
                            <p class="col-span-1 text-center text-gray-900 py-0.5 px-1 rounded bg-gray-300">
                                Total Days: {{ $totalDays }}
                            </p>
                            <div class="col-span-2">
                                <p class="text-center text-gray-900 py-0.5 px-1 rounded bg-gray-300">Previous Payments
                                </p>
                                @forelse ($reservation->transactions as $transaction)
                                    @php
                                        $totalPayments += $transaction->payment->amount;
                                    @endphp
                                    <p class="text-center text-gray-900 py-0.5 px-1 rounded bg-gray-300">
                                        {{ $transaction->payment->amount }} -
                                        {{ $transaction->payment->payment_method }}
                                    </p>
                                @empty
                                    <p class="text-center text-gray-900 py-0.5 px-1 rounded bg-gray-300">No previous
                                        transactions</p>
                                @endforelse
                                @php
                                    $totalPayable -= $totalPayments;
                                @endphp
                            </div>
                            <div class="col-span-3 text-center text-gray-900 py-0.5 px-1 rounded bg-gray-300 font-bold">
                                Total Payable: {{ $reservation->currency ? $reservation->currency->code : 'N/A'}} {{ $totalPayable }}
                            </div>
                        </div>

                        @if ($totalPayable > 0)
                            <div class="col-span-6">
                                <x-label for="payment_method" value="{{ __('Payment Method') }}" />
                                <select id="payment_method"
                                    class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                                    wire:model.defer="payment_method">
                                    <option value="">Select Payment Method</option>
                                    <option value="cash">Cash</option>
                                    <option value="card">Card</option>
                                    <option value="mobile_money">Mobile Money</option>
                                </select>
                                <x-input-error for="payment_method" class="mt-2" />
                            </div>

                            <div class="col-span-6">
                                <x-label for="payment_amount" value="{{ __('Amount ({{ $reservation->currency ? $reservation->currency->code : 'N/A'}})') }}" />
                                <x-input id="payment_amount" type="number" min="0" step="1000"
                                    max="{{ $totalPayable }}" class="mt-1 block w-full"
                                    wire:model.defer="payment_amount" />
                                <x-input-error for="payment_amount" class="mt-2" />
                            </div>
                        @endif
                    </div>
                </x-slot>
            </x-form-section>
        </x-slot>

        <x-slot name="footer">
            <x-action-message class="mr-3" on="saved">
                {{ __('Saved.') }}
            </x-action-message>
            @if ($totalPayable > 0)
                <x-button wire:click="createTransaction">
                    {{ __('Save') }}
                </x-button>
            @endif
        </x-slot>
    </x-dialog-modal>
</div>

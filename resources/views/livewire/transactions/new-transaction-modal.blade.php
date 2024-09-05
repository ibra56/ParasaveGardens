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
                        @php
                            $totalPayable = 0;
                        @endphp
                        <div class="col-span-6">
                            Name: <br>
                            {{ $reservation->customer ? $reservation->customer->name : 'Na' }}
                        </div>
                        <div class="col-span-6">
                            <x-label>Payment Method</x-label>
                            <select wire:model="payment_method" class="w-full ronded-md">
                                <option value="">Select Payment Method</option>
                                <option value="cash">Cash</option>
                                <option value="mobile_money">Mobile Money</option>
                            </select>
                        </div>
                        <div class="col-span-6">
                            <x-label for="payment_date">Payment Date</x-label>
                            <x-input wire:model="payment_date" type='datetime-local' />
                        </div>
                        <div class="col-span-6">
                            <x-label for="currency">Payment Date</x-label>
                            <select wire:model.live.debounce.500ms="currency" class="w-full ronded-md">
                                <option value="">Select Currency</option>
                                @foreach ($currencies as $o_currency)
                                    <option value="{{ $o_currency->code }}">{{ $o_currency->code }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-span-6">
                            <x-label for="payment_amount">Payable Ammount</x-label>
                            <x-input wire:model.live.debounce.500ms="payment_amount" type='number' />
                        </div>
                        <div class="col-span-6">
                            @if ($payment_amount)
                                {{ 'Payable Amount: ' }}
                                {{ $currency ?? '' }}
                                {{ number_format(round($payment_amount)) }}
                            @endif
                        </div>
                    </div>
                </x-slot>
            </x-form-section>
        </x-slot>

        <x-slot name="footer">
            <x-action-message class="mr-3" on="saved">
                {{ __('Saved.') }}
            </x-action-message>
            {{-- @if ($totalPayable > 0) --}}
                <x-button wire:click="createTransaction">
                    {{ __('Save') }}
                </x-button>
            {{-- @endif --}}
        </x-slot>
    </x-dialog-modal>
</div>

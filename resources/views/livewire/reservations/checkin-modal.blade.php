<div>
    {{-- Trigger Button --}}
    <x-button wire:click="openModal" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
        Check In
    </x-button>

    {{-- Modal --}}
    <x-dialog-modal wire:model="checkInModal_isOpen">
        <x-slot name="title">
            Check In - Reservation #{{ $reservation->uuid }}
        </x-slot>

        <x-slot name="content">
            <div class="mb-4">
                <p><strong>Customer Name:</strong> {{ $reservation->customer->name }}</p>
                <p><strong>Reservation Date:</strong> {{ $reservation->reservation_date }}</p>
                <p><strong>Number of People:</strong> {{ $reservation->number_of_people }}</p>
                <p><strong>Number of days:</strong> {{ $reservation->number_of_days }}</p>
                <p><strong>Check-in Date:</strong> {{ $reservation->checkin_date ?? 'Not checked in yet' }}</p>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label for="checkin_date" class="block text-sm font-medium text-gray-700">Check-in Date</label>
                    <input id="checkin_date" type="datetime-local" wire:model="checkin_date"
                        class="mt-1 block w-full border-gray-300 rounded-md">
                    @error('checkin_date')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="room_id" class="block text-sm font-medium text-gray-700">Assign Room</label>
                    <select id="room_id" wire:model="room_id" class="mt-1 block w-full border-gray-300 rounded-md">
                        <option value="">Select Room</option>
                        @foreach ($rooms as $room)
                            <option value="{{ $room->id }}">{{ $room->name }}</option>
                        @endforeach
                    </select>
                    @error('room_id')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="currency_id" class="block text-sm font-medium text-gray-700">Currency</label>
                    <select id="currency_id" wire:model.live.debounce.500ms="currency_id"
                        class="mt-1 block w-full border-gray-300 rounded-md">
                        <option value="">Select Currency</option>
                        @foreach ($currencies as $currency)
                            <option value="{{ $currency->id }}">{{ $currency->code }}</option>
                        @endforeach
                    </select>
                    @error('currency_id')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="custom_price" class="block text-sm font-medium text-gray-700">Custom Price</label>
                    <input id="custom_price" type="number" step="0.01" wire:model.live.debounce.500ms="custom_price"
                        class="mt-1 block w-full border-gray-300 rounded-md">
                    @error('custom_price')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>





            </div>
        </x-slot>

        <x-slot name="footer">
            @if ($custom_price)
                <span>{{ App\Models\Currency::where('id', $currency_id)->first() ? App\Models\Currency::where('id', $currency_id)->first()->code : '' }}
                    {{ number_format($custom_price, 2) }}</span>
            @endif
            <x-button wire:click="checkIn"
                class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                Check In
            </x-button>
            <x-button class="ml-2 bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"
                wire:click="closeModal" wire:loading.attr="disabled">
                Cancel
            </x-button>
        </x-slot>
    </x-dialog-modal>
</div>

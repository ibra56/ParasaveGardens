<div class="p-5">
    {{-- Be like water. --}}
    <x-form-section submit="">
        <x-slot name="title">
            {{ __('New Reservation') }}
        </x-slot>

        <x-slot name="description">
            {{ __('Create a new reservation.') }}
        </x-slot>

        <x-slot name="form">
            <div class="col-span-6 grid grid-cols-12 gap-4">

                <div wire:ignore class="col-span-6">
                    <x-label for="name">{{ __('Name') }} <span class="text-rose-500">*</span> </x-label>
                    <select id="name_select" wire:model.defer="name"
                        class="mt-1 block w-1/2 form-select border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                        <option value="">Select Staff</option>
                        @foreach ($guests as $guest)
                            <option value="{{ $guest->name }}">{{ $guest->name }}</option>
                        @endforeach
                    </select>
                    <x-input-error for="name" class="mt-2" />
                </div>

                @script
                    <script>
                        $('#name_select').select2({
                            tags: true
                        });
                        $('#name_select').on("change", function(event) {
                            $wire.$set('name', event.target.value)
                        });
                    </script>
                @endscript

                <div class="col-span-6">
                    <x-label for="gender" value="{{ __('Gender') }}" />
                    {{-- <x-input id="gender" type="text" class="mt-1 block w-full" wire:model.defer="gender" /> --}}
                    <select id="gender"
                        class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                        wire:model.defer="gender">
                        <option value="">Select Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                    <x-input-error for="gender" class="mt-2" />
                </div>

                <div class="col-span-6">
                    <x-label for="phone" value="{{ __('Phone Number') }}" />
                    <x-input id="phone" type="text" class="mt-1 block w-full" wire:model.defer="phone" />
                    <x-input-error for="phone" class="mt-2" />
                </div>

                <div class="col-span-6">
                    <x-label for="phone2" value="{{ __('Alt Phone Number') }}" />
                    <x-input id="phone2" type="text" class="mt-1 block w-full" wire:model.defer="phone2" />
                    <x-input-error for="phone2" class="mt-2" />
                </div>

                <div class="col-span-6">
                    <x-label for="email" value="{{ __('Email') }}" />
                    <x-input id="email" type="email" class="mt-1 block w-full" wire:model.defer="email" />
                    <x-input-error for="email" class="mt-2" />
                </div>


                <div class="col-span-6">
                    <x-label for="address" value="{{ __('Address') }}" />
                    <x-input id="address" type="text" class="mt-1 block w-full" wire:model.defer="address" />
                    <x-input-error for="address" class="mt-2" />
                </div>

                <div class="col-span-6">
                    <x-label for="nin" value="{{ __('NIN') }}" />
                    <x-input id="nin" type="text" class="mt-1 block w-full" wire:model.defer="nin" />
                    <x-input-error for="nin" class="mt-2" />
                </div>


                <div class="col-span-6 ">
                    <x-label for="reservation_date" value="{{ __('Reservation Date') }}" />
                    <x-input id="reservation_date" type="datetime-local" class="mt-1 block w-full"
                        wire:model.defer="reservation_date" />
                    <x-input-error for="reservation_date" class="mt-2" />
                </div>

                <div class="col-span-6 ">
                    <x-label for="checkout_date" value="{{ __('Checkout Date') }}" />
                    <x-input id="checkout_date" type="datetime-local" class="mt-1 block w-full"
                        wire:model.defer="checkout_date" />
                    <x-input-error for="checkout_date" class="mt-2" />
                </div>

                <div class="col-span-6">
                    <x-label for="room_price_id" value="{{ __('Room') }}" />
                    <select id="room_price_id"
                        class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                        wire:model.defer="room_price_id">
                        <option value="">Select Room</option>
                        @foreach ($rooms as $room)
                            <option value="{{ $room->id }}">{{ $room->room->name . ' - ' . $room->room->roomPrice->price  }}</option>
                        @endforeach
                    </select>
                    <x-input-error for="room_price_id" class="mt-2" />
                </div>
            </div>

        </x-slot>

        <x-slot name="actions">
            <x-action-message class="mr-3" on="saved">
                {{ __('Saved.') }}
            </x-action-message>

            <x-button wire:click="saveReservation">
                {{ __('Save') }}
            </x-button>
        </x-slot>
    </x-form-section>
</div>

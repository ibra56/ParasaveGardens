<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
    <button class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600" wire:click="openNewRoomModal">Create Room</button>
    <x-dialog-modal wire:model="newRoomModal_isOpen">
        <x-slot name="title">
            {{ __('Create Room') }}
        </x-slot>
        <x-slot name="content">
            <x-form-section submit="" enctype="multipart/form-data">
                <x-slot name="title">
                    {{ __('New Room') }}
                </x-slot>
                <x-slot name="description">
                    {{ __('Create a new room for your users.') }}
                </x-slot>
                <x-slot name="form">
                    <div class="col-span-6">
                        <x-validation-errors class="mb-4" />
                    </div>
                    <div class="col-span-6">
                        {{-- <img class="w-full h-48 object-cover object-center" src="{{ $image->temporaryUrl() }}" alt="{{ $room->name }}"> --}}
                        <x-label for="image" value="{{ __('Room Image') }}" />
                        <input id="image" accept="image/*" type="file" class="mt-1 block w-full" wire:model="image" />
                        <x-input-error for="image" class="mt-2" />
                    </div>
                    <div class="col-span-6">
                        <x-label for="name" value="{{ __('Room Type') }}" />
                        <select id="room_types_id" class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" wire:model.defer="room_types_id">
                            <option value="">Select Room Type</option>
                            @foreach ($roomTypes as $roomType)
                                <option value="{{ $roomType->id }}">{{ $roomType->name }}</option>
                            @endforeach
                        </select>
                        <x-input-error for="room_types_id" class="mt-2" />
                    </div>
                    <div class="col-span-6">
                        <x-label for="name" value="{{ __('Name') }}" />
                        <x-input id="name" type="text" class="mt-1 block w-full" wire:model.defer="name" />
                        <x-input-error for="name" class="mt-2" />
                    </div>
                    <div class="col-span-6">
                        <x-label for="description" value="{{ __('Description') }}" />
                        <textarea id="description" type="text" class="mt-1 block w-full" wire:model.defer="description"></textarea>
                        <x-input-error for="description" class="mt-2" />
                    </div>
                </x-slot>
                
            </x-form-section>
            <x-slot name="footer">
                <x-secondary-button wire:click="$set('newRoomModal_isOpen', false)" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-secondary-button>
                <x-button class="ms-3" wire:click="createNewRoom" wire:loading.attr="disabled">
                    {{ __('Create') }}
                </x-button>
            </x-slot>
        </x-slot>
    </x-dialog-modal>
</div>

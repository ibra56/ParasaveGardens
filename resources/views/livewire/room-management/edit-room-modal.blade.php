<div>
    {{-- In work, do what you enjoy. --}}
    <x-button class="w-full" wire:click="openEditRoomModal">Edit Room</x-button>
    <x-dialog-modal wire:model="editRoomModal_isOpen">

        <x-slot name="title">
            {{ __('Edit Room') }}
        </x-slot>

        <x-slot name="content">
            <x-form-section submit="">
                <x-slot name="title">
                    {{ __('Edit Room') }}
                </x-slot>

                <x-slot name="description">
                    {{ __('Edit a room for your users.') }}
                </x-slot>

                <x-slot name="form">
                    <div class="col-span-6">
                        <x-validation-errors class="mb-4" />
                    </div>
                    <div class="col-span-6">
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

        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$set('editRoomModal_isOpen', false)" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-button class="ml-3" wire:click="updateRoom" wire:loading.attr="disabled">
                {{ __('Save') }}
            </x-button>
        </x-slot>
    </x-dialog-modal>

</div>

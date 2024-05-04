<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <button class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600" wire:click="openNewRoomTypeModal">Create Room Type</button>
    <x-dialog-modal wire:model="newRoomTypeModal_isOpen">
        <x-slot name="title">
            {{ __('Create Room') }}
        </x-slot>
        <x-slot name="content">
            <x-form-section submit="">
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
                <x-secondary-button wire:click="$set('newRoomTypeModal_isOpen', false)" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-secondary-button>
                <x-button class="ms-3" wire:click="createRoomType" wire:loading.attr="disabled">
                    {{ __('Create') }}
                </x-button>
            </x-slot>
        </x-slot>
    </x-dialog-modal>

</div>

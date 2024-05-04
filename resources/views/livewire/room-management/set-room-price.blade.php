<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
    <x-button class="w-full" wire:click="openSetRoomPriceModal">Set Price</x-button>

    <x-dialog-modal wire:model="setRoomPriceModal_isOpen">

        <x-slot name="title">
            {{-- {{ __('Set Price') }} --}}
        </x-slot>   

        <x-slot name="content">
            <x-form-section submit="">
                <x-slot name="title">
                    {{ __('Set Price') }}
                </x-slot>

                <x-slot name="description">
                    {{ __('Set a price for room: ' . $room->name ) }}
                </x-slot>

                <x-slot name="form">
                    <div class="col-span-6">
                        <x-label for="price" value="{{ __('Price (UGX)') }}" />
                        <x-input id="price" type="number" class="mt-1 block w-full" wire:model.defer="price" />
                        <x-input-error for="price" class="mt-2" />
                    </div>
                </x-slot>

            </x-form-section>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="closeSetRoomPriceModal" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-button class="ms-3" wire:click="setRoomPrice" wire:loading.attr="disabled">
                {{ __('Set Price') }}
            </x-button>
        </x-slot>

    </x-dialog-modal>

</div>

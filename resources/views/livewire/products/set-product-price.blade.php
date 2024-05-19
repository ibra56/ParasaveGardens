<div>
    <x-button wire:click="openProductPriceModal">Set Price</x-button>

    <x-dialog-modal wire:model="setPriceModal_isOpen">
        <x-slot name="title">
            Set Price for {{ $product->name }}
        </x-slot>

        <x-slot name="content">
            <div class="mt-4">
                <x-label for="price" value="{{ __('Price') }}" />
                <x-input id="price" type="number" class="mt-1 block w-full" wire:model.defer="price" min="0" step="0.01" placeholder="Enter price" />
                @error('price') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="closeProductPriceModal">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-button class="ml-2" wire:click="savePrice">
                {{ __('Save') }}
            </x-button>
        </x-slot>
    </x-dialog-modal>
</div>

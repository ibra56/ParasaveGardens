<div>
    {{-- Be like water. --}}
    <x-button title="add item" class="bg-yellow-500 hover:bg-yellow-600 text-white" wire:click="openAddItemsModel">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle"
            viewBox="0 0 16 16">
            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
            <path
                d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4" />
        </svg>
    </x-button>

    <x-dialog-modal wire:model="isAddingItemsModalOpen">
        <x-slot name="title">
            Add Items to Order #{{ $order->id }}
        </x-slot>

        <x-slot name="content">
            <form wire:submit.prevent="">
                <div class="mt-4">
                    <x-label for="product_id" value="Product" />
                    <!-- Dynamic fields for adding multiple items -->
                    @foreach ($items as $index => $item)
                        <div class="flex items-center mt-2">
                            <select wire:model="items.{{ $index }}.product_id" class="block w-full">
                                <option value="">Select Product</option>
                                @foreach ($products as $product)
                                    <option value="{{$product->id}}">{{$product->name}}</option>
                                @endforeach
                            </select>
                            <x-input type="number" class="ml-2 w-20" placeholder="Quantity"
                                wire:model="items.{{ $index }}.quantity" />
                            <x-button wire:click.prevent="removeItem({{ $index }})" class="ml-2">
                                Remove
                            </x-button>
                        </div>
                        @error('items.' . $index . '.product_id')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                        @error('items.' . $index . '.quantity')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    @endforeach
                    <x-button wire:click.prevent="addItem" class="mt-2">
                        Add Item
                    </x-button>
                </div>
            </form>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="closeAddItemsModal">
                Cancel
            </x-secondary-button>

            <x-button class="ms-2" wire:click="addItemsToOrder">
                Save
            </x-button>
        </x-slot>
    </x-dialog-modal>

</div>

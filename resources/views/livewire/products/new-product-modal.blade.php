<div>
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
    <x-button wire:click="openNewProductModal" class="mr-2">New Product</x-button>

    <x-dialog-modal wire:model="showNewProductModal">
        <x-slot name="title">
            {{-- New Category --}}
        </x-slot>

        <x-slot name="content">
            <x-form-section submit="">
                <x-slot name="title">
                    {{ __('New Product') }}
                </x-slot>

                <x-slot name="description">
                    {{ __('Add a new product.') }}
                </x-slot>

                <x-slot name="form">

                    <div class="col-span-6">
                        <x-label for="category_id"> {{ __('Category') }} <span class="text-rose-500">*</span>
                        </x-label>
                        <select id="category_id" class="w-full" wire:model="category_id">
                            <option value="">Select Category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        <x-input-error for="category_id" class="mt-2" />
                    </div>

                    <div class="col-span-6">
                        <x-label for="name"> {{ __('Name / Title') }} <span class="text-rose-500">*</span>
                        </x-label>
                        <x-input id="name" type="text" class="w-full" wire:model="name" />
                        <x-input-error for="name" class="mt-2" />
                    </div>

                    <div class="col-span-6">
                        <x-label for="description"> {{ __('Description') }}
                        </x-label>
                        <x-input id="description" type="text" class="w-full" wire:model="description" />
                        <x-input-error for="description" class="mt-2" />
                    </div>

                    <div class="col-span-6 grid grid-cols-3 gap-4">
                        <div class="col-span-1">
                            {{-- <x-label for="is_sellable"> {{ __('Sellable?') }} </x-label> --}}
                            {{-- <x-input id="is_sellable" type="checkbox" class="w-full" wire:model="is_sellable" /> --}}
                            <div class="flex items-center gap-2">
                                <input wire:model="is_sellable" id="checked-checkbox" type="checkbox"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <x-label for="is_sellable"> {{ __('Sellable?') }} </x-label>
                            </div>
                            <x-input-error for="is_sellable" class="mt-2" />
                        </div>
                        <div class="col-span-1">
                            {{-- <x-label for="is_buyable"> {{ __('Buyable?') }} </x-label> --}}
                            {{-- <x-input id="is_buyable" type="checkbox" class="w-full" wire:model="is_buyable" /> --}}
                            <div class="flex items-center gap-2">
                                <input wire:model="is_buyable" id="checked-checkbox" type="checkbox"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <x-label for="is_buyable"> {{ __('Buyable?') }} </x-label>
                            </div>
                            <x-input-error for="is_buyable" class="mt-2" />
                        </div>
                        <div class="col-span-1">
                            {{-- <x-label for="is_manufacturable"> {{ __('Manufacturable?') }} </x-label> --}}
                            {{-- <x-input id="is_manufacturable" type="checkbox" class="w-full" wire:model="is_manufacturable" /> --}}
                            <div class="flex items-center gap-2">
                                <input wire:model="is_manufacturable" id="checked-checkbox" type="checkbox"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <x-label for="is_manufacturable"> {{ __('Manufacturable?') }} </x-label>
                            </div>
                            <x-input-error for="is_manufacturable" class="mt-2" />
                        </div>
                    </div>

                </x-slot>

            </x-form-section>
        </x-slot>

        <x-slot name="footer">
            <x-button wire:click="closeNewProductModal" wire:loading.attr="disabled">
                Cancel
            </x-button>

            <x-button class="ml-2" wire:click="createProduct" wire:loading.attr="disabled">
                Save
            </x-button>
        </x-slot>
    </x-dialog-modal>
</div>

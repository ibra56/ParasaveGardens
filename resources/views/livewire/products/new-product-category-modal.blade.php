<div>
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
    <x-button wire:click="openNewCategoryModal" class="mr-2">New Category</x-button>

    <x-dialog-modal wire:model="showNewCategoryModal">
        <x-slot name="title">
            {{-- New Category --}}
        </x-slot>

        <x-slot name="content">
            <x-form-section submit="">
                <x-slot name="title">
                    {{ __('New Category') }}
                </x-slot>

                <x-slot name="description">
                    {{ __('Create a new product category.') }}
                </x-slot>

                <x-slot name="form">
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

                </x-slot>

            </x-form-section>
        </x-slot>

        <x-slot name="footer">
            <x-button wire:click="closeNewCategoryModal" wire:loading.attr="disabled">
                Cancel
            </x-button>

            <x-button class="ml-2" wire:click="createCategory" wire:loading.attr="disabled">
                Save
            </x-button>
        </x-slot>
    </x-dialog-modal>
</div>

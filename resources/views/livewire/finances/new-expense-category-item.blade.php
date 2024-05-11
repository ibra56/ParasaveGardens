<div>
    {{-- Success is as dangerous as failure. --}}
    <x-button wire:click="openNewCategoryItemModal">
        Add
    </x-button>

    <x-dialog-modal wire:model="newCategoryItemModal_isOpen">
        <x-slot name="title">
            <span class="capitalize">{{ $financialCategory->name }}</span>
        </x-slot>

        <x-slot name="content">
            <x-form-section submit="">
                <x-slot name="title">
                    {{ __('New category item') }}
                </x-slot>

                <x-slot name="description">
                    {{ __('Create a new category item.') }}
                </x-slot>

                <x-slot name="form">
                    <div class="col-span-6">
                        <x-validation-errors class="mb-4" />
                    </div>
                    <div class="col-span-6 sm:col-span-4">
                        <x-label for="name"> {{ __('Name / Title') }} <span class="text-rose-500">*</span>
                        </x-label>
                        <x-input id="name" type="text" class="w-full" wire:model="name" />
                        <x-input-error for="name" class="mt-2" />
                    </div>


                    <div class="col-span-6 sm:col-span-4">
                        <x-label for="description"> {{ __('Description') }}
                        </x-label>
                        <x-input id="description" type="text" class="w-full" wire:model="description" />
                        <x-input-error for="description" class="mt-2" />
                    </div>

                </x-slot>

            </x-form-section>

            <x-slot name="footer">
                <x-action-message class="mr-3 text-green-600" on="saved">
                    {{ __('Saved.') }}
                </x-action-message>

                <x-button class="mr-3" wire:click="createCategoryItem">
                    {{ __('Save') }}
                </x-button>
                <x-secondary-button wire:click="closeNewCategoryItemModal" wire:loading.attr="disabled">
                    {{ __('Close') }}
                </x-secondary-button>

            </x-slot>

        </x-slot>
    </x-dialog-modal>


</div>

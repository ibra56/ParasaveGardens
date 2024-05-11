<div>
    {{-- Stop trying to control. --}}

    <x-button wire:click="openEditCategoryModal" class="mr-2">Edit</x-button>

    <x-dialog-modal wire:model="editCategoryModal_isOpen">
        <x-slot name="title">
            <span class="capitalize">{{ 'Expense Category' }}</span>
        </x-slot>

        <x-slot name="content">
            <x-form-section submit="">

                <x-slot name="title">
                    {{-- {{ __('Edit ' . $category->name ) }} --}}
                </x-slot>

                <x-slot name="description">
                    {{ __('Edit ' . $category->name) }}
                </x-slot>

                <x-slot name="form">
                    <div class="col-span-6">
                        <x-validation-errors class="mb-4" />
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

                </x-slot>

            </x-form-section>


        </x-slot>

        <x-slot name="footer">
            <x-action-message class="mr-3 text-green-600" on="saved">
                {{ __('Saved.') }}
            </x-action-message>

            <x-button class="mr-3" wire:loading.attr="disabled" wire:click="updateCategory">
                {{ __('Save') }}
            </x-button>
            <x-secondary-button wire:click="closeEditCategoryModal" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-secondary-button>

        </x-slot>

    </x-dialog-modal>
</div>

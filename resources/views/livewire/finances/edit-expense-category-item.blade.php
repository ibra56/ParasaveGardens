<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
    <x-button wire:click="openEditCategoryModal">
        Edit
    </x-button>

    <x-dialog-modal wire:model="editCategoryModal_isOpen">
        <x-slot name="title">
            <span class="capitalize">{{  'Expense Category: ' . $categoryItem->financialExpenseCategory->name }}</span>
        </x-slot>

        <x-slot name="content">
            
            <x-form-section submit="">

                <x-slot name="title">
                    {{ __('Edit Category Item: ' . $categoryItem->name ) }}
                </x-slot>

                <x-slot name="description">
                    {{ __('Edit Category Item: ' . $categoryItem->name ) }}
                    {{-- {{ __('Edit this category item.') }} --}}
                </x-slot>

                <x-slot name="form">
                    <div class="col-span-6">
                        <x-label for="name"> {{ __('Name') }} <span class="text-rose-500">*</span> </x-label>
                        <x-input id="name" type="text" class="w-full" wire:model.defer="name" />
                        <x-input-error for="name" class="mt-2" />
                    </div>

                    

                    <div class="col-span-6">
                        <x-label for="description"> {{ __('Description') }} </x-label>
                        <x-input id="description" type="text" class="w-full" wire:model.defer="description" />
                        <x-input-error for="description" class="mt-2" />
                    </div>

                </x-slot>

            </x-form-section>
            
        </x-slot>

        <x-slot name="footer">
            <x-action-message class="mr-3" on="categoryItemUpdated">
                {{ __('Saved.') }}
            </x-action-message>

            <x-button class="mr-3" wire:click="updateCategoryItem">
                {{ __('Save') }}
            </x-button>
            <x-secondary-button wire:click="closeEditCategoryItemModal" wire:loading.attr="disabled">
                {{ __('Close') }}
            </x-secondary-button>

        </x-slot>

    </x-dialog-modal>
</div>

<div class="m-10">

    <x-form-section submit="">
        <x-slot name="title">
            {{ __('New Expense') }}
        </x-slot>

        <x-slot name="description">
            {{ __('Create a new expense.') }}
        </x-slot>

        <x-slot name="form">
            <div class="col-span-6">
                <x-validation-errors />
            </div>
                <div class="col-span-6">
                <div class=" grid grid-cols-12 gap-4">
                    <div wire:ignore class="col-span-6">
                        <x-label for="category_id"> {{ __('Expense Item') }} <span class="text-rose-500">*</span>
                        </x-label>
                        <select id="select_category_id"
                            class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                            wire:model="category_id">
                            <option value="">Select Expense Item</option>
                            @foreach ($financialCategories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>

                        <x-input-error for="category_id" class="mt-2" />
                    </div>

                    <div class="col-span-6">
                        <x-label for="date_of_pay"> {{ __('Date of Payment') }} <span class="text-rose-500">*</span>
                        </x-label>
                        <x-input id="date_of_pay" type="date" class="w-full" wire:model="date_of_pay" />
                        <x-input-error for="date_of_pay" class="mt-2" />
                    </div>



                    <div class="col-span-6">
                        <x-label for="amount"> {{ __('Amount') }} <span class="text-rose-500">*</span>
                        </x-label>
                        <x-input id="amount" min="0" type="number" class="w-full" wire:model="amount" />
                        <x-input-error for="amount" class="mt-2" />
                    </div>

                    <div class="col-span-6">
                        <x-label for="description"> {{ __('Narration') }} <span class="text-rose-500">*</span>
                        </x-label>
                        <x-input id="description" type="text" class="w-full" wire:model="description" />
                        <x-input-error for="description" class="mt-2" />
                    </div>




                </div>

            </div>

            @script
                <script>
                    $(document).ready(function() {
                        $('#select_category_id').select2();
                        $('#select_category_id').on("change", function(event) {
                            $wire.$set('category_id', event.target.value)
                        });

                    });
                </script>
            @endscript


        </x-slot>

        <x-slot name="actions">
            <x-button class="mr-3" wire:click="createExpense" wire:loading.attr="disabled">
                {{ __('Save') }}
            </x-button>

            <x-secondary-button wire:click="cancelExpense" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-secondary-button>
        </x-slot>

    </x-form-section>
</div>

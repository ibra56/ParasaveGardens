<div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
    <x-button wire:click="openNewSupplierModal">
        New Supplier
    </x-button>
    <x-dialog-modal wire:model="newSupplierModal_isOpen">
        <x-slot name="title">
            {{-- Add Supplier --}}
        </x-slot>
        <x-slot name="content">
            <x-form-section submit="">
                <x-slot name="title">
                    Add Supplier
                </x-slot>
                <x-slot name="description">
                    Add a new supplier
                </x-slot>
                <x-slot name="form">
                    <div class="col-span-6 grid grid-cols-12 gap-4">

                        <div class="col-span-6">
                            <x-label for="name"> Name <span class="text-rose-500">*</span> </x-label>
                            <x-input id="name" type="text" class="mt-1 block w-full" wire:model.defer="name" />
                            <x-input-error for="name" class="mt-2" />
                        </div>
                        <div class="col-span-6">
                            <x-label for="email"> Email </x-label>
                            <x-input id="email" type="text" class="mt-1 block w-full" wire:model.defer="email" />
                            <x-input-error for="email" class="mt-2" />
                        </div>
                        <div class="col-span-6">
                            <x-label for="phone"> Phone <span class="text-rose-500">*</span> </x-label>
                            <x-input id="phone" type="text" class="mt-1 block w-full" wire:model.defer="phone" />
                            <x-input-error for="phone" class="mt-2" />
                        </div>
                        <div class="col-span-6">
                            <x-label for="phone2"> Alt. Phone </x-label>
                            <x-input id="phone2" type="text" class="mt-1 block w-full"
                                wire:model.defer="phone2" />
                            <x-input-error for="phone2" class="mt-2" />
                        </div>
                        <div class="col-span-6">
                            <x-label for="company_name"> Company Name </x-label>
                            <x-input id="company_name" type="text" class="mt-1 block w-full"
                                wire:model.defer="company_name" />
                            <x-input-error for="company_name" class="mt-2" />
                        </div>
                        <div class="col-span-6">
                            <x-label for="website"> Website </x-label>
                            <x-input id="website" type="text" class="mt-1 block w-full"
                                wire:model.defer="website" />
                            <x-input-error for="website" class="mt-2" />
                        </div>
                        <div class="col-span-12">
                            <x-label for="address"> Address <span class="text-rose-500">*</span> </x-label>
                            <x-input id="address" type="text" class="mt-1 block w-full"
                                wire:model.defer="address" />
                            <x-input-error for="address" class="mt-2" />
                        </div>

                    </div>
                </x-slot>
            </x-form-section>
        </x-slot>
        <x-slot name="footer">
            <x-button wire:click="closeNewSupplierModal" wire:loading.attr="disabled">
                Cancel
            </x-button>
            <x-button class="ml-2" wire:click="addSupplier" wire:loading.attr="disabled">
                Save
            </x-button>
        </x-slot>
    </x-dialog-modal>
</div>

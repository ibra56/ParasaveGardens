<div>
    {{-- The whole world belongs to you. --}}
    <x-button wire:click="openNewStaffModal">New Staff</x-button>

    <x-dialog-modal wire:model="newStaffModal_isOpen">

        <x-slot name="title">
            {{ __('New Staff') }}
        </x-slot>

        <x-slot name="content">
            <x-form-section submit="saveNewStaff">
                <x-slot name="title">
                    {{-- {{ __('New Staff') }} --}}
                </x-slot>

                <x-slot name="description">
                    {{ __('Create a new staff member.') }}
                </x-slot>

                <x-slot name="form">
                    <div class="col-span-6 grid grid-cols-12 gap-6">
                        <div class="col-span-6">
                            <x-label for="name" value="{{ __('Name') }}" />
                            <x-input id="name" type="text" class="mt-1 block w-full" wire:model.defer="name" />
                            <x-input-error for="name" class="mt-2" />
                        </div>

                        <div class="col-span-6">
                            <x-label for="email" value="{{ __('Email') }}" />
                            <x-input id="email" type="email" class="mt-1 block w-full" wire:model.defer="email" />
                            <x-input-error for="email" class="mt-2" />
                        </div>

                        <div class="col-span-6">
                            <x-label for="phone_number_one" value="{{ __('Phone Number') }}" />
                            <x-input id="phone_number_one" type="text" class="mt-1 block w-full"
                                wire:model.defer="phone_number_one" />
                            <x-input-error for="phone_number_one" class="mt-2" />
                        </div>

                        <div class="col-span-6">
                            <x-label for="phone_number_two" value="{{ __('Alternate Phone Number') }}" />
                            <x-input id="phone_number_two" type="text" class="mt-1 block w-full"
                                wire:model.defer="phone_number_two" />
                            <x-input-error for="phone_number_two" class="mt-2" />
                        </div>

                        <div class="col-span-6">
                            <x-label for="gender" value="{{ __('Gender') }}" />
                            <select id="gender" class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                                wire:model.defer="gender">
                                <option value="">Select Gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                            <x-input-error for="gender" class="mt-2" />
                        </div>

                        <div class="col-span-6">
                            <x-label for="date_of_birth" value="{{ __('Date of Birth') }}" />
                            <x-input id="date_of_birth" type="date" class="mt-1 block w-full"
                                wire:model.defer="date_of_birth" />
                            <x-input-error for="date_of_birth" class="mt-2" />
                        </div>

                        <div class="col-span-6">
                            <div class="flex items-center">
                                <input id="checked-checkbox" wire:model.live="can_login" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" />
                                <x-label for="checked-checkbox" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Can login?</x-label>
                            </div>
                            <x-input-error for="can_login" class="mt-2" />
                        </div>
                        {{$can_login}}
                    </div>
                </x-slot>
            </x-form-section>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="closeNewStaffModal" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-button class="ml-3" wire:click="saveNewStaff" wire:loading.attr="disabled">
                {{ __('Save') }}
            </x-button>
        </x-slot>

    </x-dialog-modal>

</div>

<div class="w-full">
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
    <x-button class="w-full" wire:click="openSponsorsProfileEditModal">Edit Profile</x-button>

    <x-dialog-modal wire:model="editProfileModal_isOpen" maxWidth="lg">
        <x-slot name="title">
            Staff Profile: {{ $sponsor->name }}
        </x-slot>

        <x-slot name="content">

            <x-form-section submit="">
                <x-slot name="title">
                    {{-- Edit Profile --}}
                </x-slot>

                <x-slot name="description">
                    Edit Staff Profile
                </x-slot>

                <x-slot name="form">
                    <div class="col-span-6">
                        <div class="grid grid-cols-12 gap-4">
                            <div class="col-span-6">
                                <x-label for="name">Name</x-label>
                                <x-input id="name" type="text" class="w-full" wire:model.defer="name" />
                                <x-input-error for="name" class="mt-2" />
                            </div>

                            <div class="col-span-6">
                                <x-label for="date_of_birth">Date of Birth</x-label>
                                <x-input id="date_of_birth" type="date" class="w-full"
                                    wire:model.defer="date_of_birth" />
                                <x-input-error for="date_of_birth" class="mt-2" />
                            </div>

                            <div class="col-span-12">
                                <x-label for="email">Email</x-label>
                                <x-input id="email" type="email" class="w-full" wire:model.defer="email" />
                                <x-input-error for="email" class="mt-2" />
                            </div>

                            <div class="col-span-6">
                                <x-label for="phone_number_one">Phone</x-label>
                                <x-input id="phone" type="text" class="w-full"
                                    wire:model.defer="phone_number_one" />
                                <x-input-error for="phone_number_one" class="mt-2" />
                            </div>

                            <div class="col-span-6">
                                <x-label for="phone_number_two">Phone Alternate</x-label>
                                <x-input id="phone" type="text" class="w-full"
                                    wire:model.defer="phone_number_two" />
                                <x-input-error for="phone_number_two" class="mt-2" />
                            </div>

                            <div class="col-span-6">
                                <x-label for="gender">Gender</x-label>
                                <select id="gender" class="w-full" wire:model.defer="gender">
                                    <option value="">Select Gender</option>
                                    <option value="m">Male</option>
                                    <option value="f">Female</option>
                                </select>
                                <x-input-error for="gender" class="mt-2" />
                            </div>
                            <div class="col-span-6">
                                <x-label for="profile_picture">Profile Picture</x-label>
                                <x-input id="profile_picture" type="file" class="w-full"
                                    wire:model.defer="profile_picture" />
                                <x-input-error for="profile_picture" class="mt-2" />
                            </div>
                            @if ($profile_picture)
                                <div class="col-span-6">
                                    <img src="{{ $profile_picture->temporaryUrl() }}" class="w-16 h-16">
                                </div>
                            @else
                                <div class="col-span-6">
                                    <img src="{{ $sponsor->user->profile_photo_url }}" class="w-16 h-16">
                                </div>
                            @endif
                        </div>
                    </div>

                </x-slot>
            </x-form-section>
        </x-slot>

        <x-slot name="footer">
            <x-button class="mr-3" wire:click="updateSponsorsProfile" wire:loading.attr="disabled">
                Save
            </x-button>
            <x-secondary-button wire:click="closeSponsorsProfileEditModal" wire:loading.attr="disabled">
                Cancel
            </x-secondary-button>
        </x-slot>

    </x-dialog-modal>


</div>

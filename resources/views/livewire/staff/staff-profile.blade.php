<div class="p-5">
    {{-- Nothing in the world is as soft and yielding as water. --}}
    <div class="grid grid-cols-4 gap-4">

        @livewire('staff.static-profile-card', ['staff_id' => $staff->id])

        <div
            class="col-span-3 bg-white dark:bg-slate-800 shadow-lg rounded-sm border border-slate-200 dark:border-slate-700 px-5">
            <div class="flex justify-between items-center border-b border-gray-200 dark:border-gray-700 ">
                <div class="grid grid-cols-4">
                    <div class="flex">
                        <div class="col-span-1 hover:cursor-pointer hover:bg-gray-200 bg-gray dark:bg-slate-700 font-semibold px-2 py-1
                            @if (request()->routeIs('sponsors.view')) bg-gray-200 @endif"
                            wire:click="navigateToOverview">
                            Overview
                        </div>

                    </div>

                </div>

            </div>
            <div>
                @if (request()->routeIs('users.profile'))
                    profile
                @endif
            </div>
        </div>

    </div>
</div>

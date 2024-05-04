<div class="p-5">
    {{-- Nothing in the world is as soft and yielding as water. --}}
    <div class="grid grid-cols-4 gap-4">

        @livewire('staff.static-profile-card', ['staff_id' => $staff->id])
        
        <div
            class="col-span-3  bg-white dark:bg-slate-800 shadow-lg rounded-sm border border-slate-200 dark:border-slate-700 px-5 rounded-lg shadow-lg hover:shadow-blue-400">

            <div class="flex w-full  rounded shadow">
                <a href="" aria-current="false"
                    class="w-full flex justify-center font-medium rounded-l px-5 py-2 border bg-white text-gray-800 border-gray-200 hover:bg-gray-100"
                    @if (request()->routeIs('users.profile')) bg-gray-200 @endif wire:click="navigateToOverview">
                            Overview
                </a>
            
                <a href="" aria-current="page"
                    class="w-full flex justify-center font-medium px-5 py-2 border-t border-b  text-gray-800  border-gray-200  hover:bg-gray-100"
                    @if (request()->routeIs('users.profile.security')) bg-gray-200 @endif wire:click="navigateToSecurity">
                            Settings
                </a>    
            </div>
            <div>
                @if (request()->routeIs('users.profile'))
                    profile
                @elseif (request()->routeIs('users.profile.security'))
                    security
                @endif
            </div>

            {{-- <div class="flex justify-between items-center border-b border-gray-200 dark:border-gray-700  py-3">
                <div class="grid grid-cols-4 space-x-4">
                    <div class="flex ">
                        <div class="col-span-1 hover:cursor-pointer hover:bg-gray-200 bg-gray dark:bg-slate-700 font-semibold px-2 py-3
                            @if (request()->routeIs('users.profile')) bg-gray-200 @endif"
                            wire:click="navigateToOverview">
                            Overview
                        </div>
                        <div class="col-span-1 hover:cursor-pointer hover:bg-gray-200 bg-gray dark:bg-slate-700 font-semibold px-2 py-3 
                        @if (request()->routeIs('users.profile.security')) bg-gray-200 @endif"
                            wire:click="navigateToSecurity">
                            Security
                        </div>

                    </div>

                </div>

            </div>
            <div>
                @if (request()->routeIs('users.profile'))
                    profile
                @elseif (request()->routeIs('users.profile.security'))
                    security
                @endif
            </div> --}}
        </div>

    </div>
</div>

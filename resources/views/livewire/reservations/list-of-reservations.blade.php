<div>
    {{-- Because she competes with no one, no one can compete with her. --}}
    <div wire:poll>
        {{-- Close your eyes. Count to one. That is how long forever feels. --}}
        <div class="overflow-x-auto p-4">


            <div class="py-4 px-4 flex justify-between  border-b border-slate-200 dark:border-slate-700">
                <h1 class="text-2xl font-semibold text-slate-800 dark:text-slate-200">Reservations</h1>
                <div class="flex justify-end">


                    {{-- <div class="relative mr-4">
                        <input type="text" wire:model.live="search"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Search name or email..." />
                    </div> --}}



                    <div class="mr-4">
                        {{-- per page selection --}}
                        <select wire:model.live="perPage"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                            <option value="20">20</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                            <option value="250">250</option>
                            <option value="500">500</option>
                        </select>
                    </div>

                    @can('create-users')
                        @livewire('staff.new-staff-modal')
                    @endcan

                </div>
            </div>
        </div>
    </div>
</div>

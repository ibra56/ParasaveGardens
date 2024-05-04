<div>
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
    <div class="bg-white shadow overflow-hidden sm:rounded-lg px-4 py-4">
        <div class="px-4  sm:px-6 px-4 mb-2"></div>
        <div class="flex items-center justify-between">
            <div class="px-4 sm:px-6 ">
                <h3 class="text-lg font-medium leading-6 text-gray-900">New Room</h3>
                <p class="mt-1 max-w-2xl text-sm text-gray-500">List of all rooms</p>
            </div>
            <div class="px-4 sm:px-6 ">
                @if (auth()->user()->can('create-room'))
               @livewire('room-management.new-room-modal')
                @endif
            </div>
        </div>
    </div>

</div>

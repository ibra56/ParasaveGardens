<div>
    {{-- Do your work, then step back. --}}
    <div class="bg-white shadow overflow-hidden sm:rounded-lg px-4 py-4">
        <div class="px-4  sm:px-6 px-4 mb-2"></div>
        <div class="flex items-center justify-between">
            <div class="px-4 sm:px-6 ">
                <h3 class="text-lg font-medium leading-6 text-gray-900">Room Types</h3>
                <p class="mt-1 max-w-2xl text-sm text-gray-500">List of all room types</p>
            </div>
            <div class="px-4 sm:px-6 ">
                @if (auth()->user()->can('create-room-type'))
               @livewire('room-management.new-room-type-modal')
                @endif
            </div>
        </div>
       

    </div>
    
</div>

</div>

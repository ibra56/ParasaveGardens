<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
    <div class="grid grid-cols-1 border-t  md:grid-cols-2  mt-6 lg:grid-cols-3 gap-6" wire:poll>
        @forelse ($roomTypes as $roomType)
            <div class="bg-white border mt-6 dark:bg-slate-800 rounded-lg shadow-md overflow-hidden hover:shadow-xl transition duration-300">
                <div class="p-6">
                    <h2 class="text-xl font-semibold mb-2">{{ $roomType->name }}</h2>
                    <p class="text-gray-600 mb-4">{{ $roomType->description }}</p>
                    @livewire('room-management.edit-room-type-modal', ['roomType' => $roomType], key('edit-room-type-modal-' . $roomType->id))
                </div>
            </div>
        @empty
            <p class="text-center mt-6">No room types found</p>
        @endforelse
</div>

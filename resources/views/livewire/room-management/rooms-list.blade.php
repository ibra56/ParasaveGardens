<div class="grid grid-cols-1 border-t  md:grid-cols-2  mt-6 lg:grid-cols-3 gap-6" wire:poll>
    @forelse ($rooms as $room)
        <div class="bg-white border mt-6 dark:bg-slate-800 rounded-lg shadow-md overflow-hidden hover:shadow-xl transition duration-300">
            {{-- <img class="w-full h-48 object-cover object-center" src="{{ $room->image_url }}" alt="{{ $room->name }}"> --}}
            <div class="p-6">
                <h2 class="text-xl font-semibold mb-2">{{ $room->name }}</h2>                
                <p class="text-gray-600 mb-1">{{ $room->description }}</p>
                <p class="text-gray-600 mb-1"><span class="font-medium">Room Type:</span> {{ $room->roomType->name }}</p>
                <p class="text-gray-700 mb-1">{{ $room->roomPrice ? 'Price: UGX ' . $room->roomPrice->price : 'No Price' }}</p>
                <div class="flex justify-between">
                    @livewire('room-management.edit-room-modal', ['room' => $room], key('edit-room-modal-' . $room->id))
        
                    @livewire('room-management.set-room-price', ['room' => $room], key('set-room-price-' . $room->id))

                </div>

            </div>
        </div>
    @empty
        <p class="text-center mt-6">No rooms found</p>
    @endforelse
</div>

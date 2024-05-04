<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6" wire:poll>
    @forelse ($rooms as $room)
        <div class="bg-green-100 rounded-lg shadow-md p-6">
            <h2 class="text-xl font-semibold">{{ $room->name }}</h2>
            <p class="text-gray-600 mt-2">{{ $room->description }}</p>
            <p class="text-gray-700 mt-2">{{ $room->roomPrice ? 'UGX ' . $room->roomPrice->price : 'No Price' }}</p>
            @livewire('room-management.set-room-price', ['room' => $room], key('set-room-price-' . $room->id))
        </div>
    @empty
        <p class="text-center mt-6">No rooms found</p>
    @endforelse
</div>

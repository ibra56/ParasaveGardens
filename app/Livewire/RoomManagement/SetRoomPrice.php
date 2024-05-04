<?php

namespace App\Livewire\RoomManagement;

use App\Models\RoomPrice;
use Livewire\Component;

class SetRoomPrice extends Component
{

    public $setRoomPriceModal_isOpen = false;
    public $room;
    public $name;
    public $price;

    public function mount($room)
    {
        $this->room = $room;

        $this->name = $room->name;
        $this->price = $room->roomPrice ? $room->roomPrice->price : 0;
    }
    public function openSetRoomPriceModal()
    {
        $this->setRoomPriceModal_isOpen = true;
    }

    public function closeSetRoomPriceModal()
    {
        $this->setRoomPriceModal_isOpen = false;
    }

    public function render()
    {
        return view('livewire.room-management.set-room-price');
    }

    public function setRoomPrice()
    {
        $this->validate([
            'price' => 'required|numeric|min:0',
        ]);
        // delte the old room price if any

        if ($roomPrices = RoomPrice::where('room_id', $this->room->id)->first()) {
            $roomPrices->delete();
        }

        RoomPrice::create([
            'room_id' => $this->room->id,
            'price' => $this->price
        ]);

        noty()->addSuccess('Room price set successfully');

        $this->closeSetRoomPriceModal();
    }
}

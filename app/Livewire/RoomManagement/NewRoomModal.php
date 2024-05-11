<?php

namespace App\Livewire\RoomManagement;

use Livewire\Component;
use App\Models\RoomType;
use App\Models\Room;

class NewRoomModal extends Component
{
    public $newRoomModal_isOpen = false;
    public $roomTypes;
    public $room_types_id;
    public $name;
    public $description;
    public function openNewRoomModal()
    {
        $this->newRoomModal_isOpen = true;
    }
    public function createNewRoom(){
        $this->validate([
            'room_types_id' => 'required',
            'name' => 'required',
            'description' => 'required',
        ]);
        Room::create([
            'room_types_id' => $this->room_types_id,
            'name' => $this->name,
            'description' => $this->description
        ]);
        
        noty()->addSuccess('Room created successfully');
        $this->newRoomModal_isOpen = false;
        $this->reset();
    }
    public function render()
    {
        $this->roomTypes = RoomType::all();
        return view('livewire.room-management.new-room-modal');
    }
}

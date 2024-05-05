<?php

namespace App\Livewire\RoomManagement;

use App\Models\Room;
use Livewire\Component;

class EditRoomModal extends Component
{
    public $editRoomModal_isOpen = false;
    public $room;
    public $name;
    public $description;
    public function mount($room){
        $this->room = Room::find($room->id);
        $this->name = $room->name;
        $this->description = $room->description;
    }

    public function updateRoom(){
        $this->room->update([
            'name' => $this->name,
            'description' => $this->description
        ]);

        noty()->addSuccess('Room updated');
        $this->editRoomModal_isOpen = false;
    }

    public function openEditRoomModal(){
        $this->editRoomModal_isOpen = true;
    }
    public function render()
    {
        return view('livewire.room-management.edit-room-modal');
    }
}

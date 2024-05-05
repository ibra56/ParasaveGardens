<?php

namespace App\Livewire\RoomManagement;

use App\Models\Room;
use App\Models\RoomType;
use Livewire\Component;


class EditRoomTypeModal extends Component
{
    public $editRoomTypeModal_isOpen = false;
    public $roomType;
    public $name;
    public $description;
    public function mount($roomType){
        $this->roomType = RoomType::findOrFail($roomType->id);
        $this->name = $roomType->name;
        $this->description = $roomType->description;
        

    }

    public function updateRoomType(){
        $this->validate([
            'name' => 'required',
            'description' => 'required'
        ]);
        $this->roomType->update([
            'name' => $this->name,
            'description' => $this->description
        ]);
        $this->editRoomTypeModal_isOpen = false;
        noty()->addSuccess('Room type updated successfully');
    }

    public function editRoomTypeModal()
    {
        $this->editRoomTypeModal_isOpen = true;
    }
    public function render()
    {
        return view('livewire.room-management.edit-room-type-modal');
    }
}

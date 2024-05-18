<?php

namespace App\Livewire\RoomManagement;


use Livewire\Component;
use App\Models\RoomType;

class NewRoomTypeModal extends Component
{
    public $name;
    public $description;
    public $newRoomTypeModal_isOpen = false;
    public function openNewRoomTypeModal()
    {
        $this->newRoomTypeModal_isOpen = true;
    }
    public function createRoomType(){
        $this->validate([
            'name' => 'required|string|unique:room_types,name',
            'description' => 'sometimes|nullable|string',
        ]);
        RoomType::create([
            'name' => $this->name,
            'description' => $this->description
        ]);
        noty()->addSuccess('Room type created successfully');
        $this->newRoomTypeModal_isOpen = false;
        $this->reset();
       
    }
    public function render()
    {
        return view('livewire.room-management.new-room-type-modal');
    }
}

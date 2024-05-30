<?php

namespace App\Livewire\RoomManagement;

use Livewire\Component;
use App\Models\RoomType;
use App\Models\Room;
use Livewire\WithFileUploads;



class NewRoomModal extends Component
{
    use WithFileUploads;
    public $newRoomModal_isOpen = false;
    public $roomTypes;
    public $room_types_id;
    public $name;
    public $description;
    public $image;
    public function openNewRoomModal()
    {
        $this->newRoomModal_isOpen = true;
    }
    public function createNewRoom(){
        
        $this->validate([

            'room_types_id' => 'required',
            'name' => 'required',
            'description' => 'required',
            'image' => 'nullable|image ',
        ]);
        $imagePath=null;
        if ($this->image) {
            $imagePath = $this->image->store('room_images', 'public');
        }

        Room::create([
            'room_types_id' => $this->room_types_id,
            'name' => $this->name,
            'description' => $this->description,
            'image_path' => $imagePath,
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

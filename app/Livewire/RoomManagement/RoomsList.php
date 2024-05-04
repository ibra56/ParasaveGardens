<?php

namespace App\Livewire\RoomManagement;

use App\Models\Room;
use Livewire\Component;

class RoomsList extends Component
{
    public function render()
    {
        return view('livewire.room-management.rooms-list',[
            'rooms' => Room::all()
        ]);
    }
}

<?php

namespace App\Livewire\RoomManagement;

use Livewire\Component;
use App\Models\RoomType;

class RoomTypeList extends Component
{
    public $roomTypes;
    public function render()
    {
        $this->roomTypes = RoomType::all();
        return view('livewire.room-management.room-type-list');
    }
}

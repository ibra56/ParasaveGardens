<?php

namespace App\Livewire\Staff;

use App\Models\Staff;
use App\Models\User;
use Livewire\Component;

class StaticProfileCard extends Component
{
    public $staff;

    public function mount($staff_id)
    {
        $this->staff = Staff::find($staff_id);
    }
    public function render()
    {
        return view('livewire.staff.static-profile-card');
    }
}

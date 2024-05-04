<?php

namespace App\Livewire\Staff;

use App\Models\User;
use Livewire\Component;

class StaticProfileCard extends Component
{
    public $staff;

    public function mount($staff_id)
    {
        $this->staff = User::withTrashed()->find($staff_id);
    }
    public function render()
    {
        return view('livewire.staff.static-profile-card');
    }
}

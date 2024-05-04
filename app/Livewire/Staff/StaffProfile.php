<?php

namespace App\Livewire\Staff;

use App\Models\Staff;
use App\Models\User;
use Livewire\Component;

class StaffProfile extends Component
{
    public $staff;

    public function mount($staff_id)
    {
        $this->staff = Staff::find($staff_id);
    }

    public function render()
    {
        return view('livewire.staff.staff-profile');
    }
    public function navigateToOverview(){
        $this->redirect(route('users.profile', ['staff_id' => $this->staff->id]), navigate: true);
    }
    public function navigateToSecurity(){
        $this->redirect(route('users.profile.security', ['staff_id' => $this->staff->id]), navigate: true);
    }
}

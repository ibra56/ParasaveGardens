<?php

namespace App\Livewire\Staff;

use App\Models\Staff;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class NewStaffModal extends Component
{
    public $newStaffModal_isOpen = false;

    public $name;
    public $email;
    public $phone_number_one;
    public $phone_number_two;
    public $can_login;
    public $gender;
    public $date_of_birth;

    public function mount(){
        $this->can_login = false;
    }

    public function openNewStaffModal()
    {
        $this->newStaffModal_isOpen = true;
    }

    public function closeNewStaffModal()
    {
        $this->newStaffModal_isOpen = false;
    }

    public function render()
    {
        return view('livewire.staff.new-staff-modal');
    }

    public function saveNewStaff()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone_number_one' => 'sometimes|nullable',
            'phone_number_two' => 'sometimes|nullable',
            'gender' => 'required|in:male,female',
            'date_of_birth' => 'required|date',
        ]);
        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'phone_number' => $this->phone_number_one,
            'phone_number_two' => $this->phone_number_two,
            'password' => Hash::make('password'),
            'gender' => $this->gender == 'male' ? 'm' : 'f',
            'date_of_birth' => $this->date_of_birth,
        ]);

        Staff::create([
            'user_id' => $user->id,
        ]);

        if ($this->can_login == false) {
            $user->delete();
        }
        

        noty()->addSuccess('New staff added');
    }
}

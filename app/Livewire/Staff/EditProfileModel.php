<?php

namespace App\Livewire\Staff;

use App\Models\Staff;
use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditProfileModel extends Component
{
    use WithFileUploads;
    public $staff;
    public $profile_picture;
    public $editProfileModal_isOpen = true;

    public $name;
    public $email;
    public $phone_number_one;
    public $phone_number_two;
    public $gender;
    public $date_of_birth;


    public function openSponsorsProfileEditModal()
    {
        $this->editProfileModal_isOpen = true;
    }

    public function closeSponsorsProfileEditModal()
    {
        $this->editProfileModal_isOpen = false;
    }

    public function mount($staff_id)
    {
        $this->staff = Staff::find($staff_id);
        $this->name = $this->staff->user->name;
        $this->email = $this->staff->user->email;
        $this->phone_number_one = $this->staff->user->phone_number;
        $this->phone_number_two = $this->staff->user->phone_number_two;
        $this->gender = $this->staff->user->gender;
        $this->date_of_birth = $this->staff->user->date_of_birth;
    }
    public function render()
    {
        return view(
            'livewire.staff.edit-profile-model',
            [
                'sponsor' => $this->staff
            ]
        );
    }

    public function updateSponsorsProfile()
    {

        $this->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone_number_one' => 'sometimes|nullable',
            'phone_number_two' => 'sometimes|nullable',
            'gender' => 'required|in:m,f',
            'date_of_birth' => 'required|date',
            'profile_picture' => 'nullable|sometimes|image|max:1024',
        ]);

        if ($this->profile_picture) {
            $profilePicturePath = $this->profile_picture->store('profile-photos', 'public');
        }
        // dd($profilePicturePath);

        $this->staff->user->update([
            'name' => $this->name,
            'email' => $this->email,
            'phone_number' => $this->phone_number_one,
            'phone_number_two' => $this->phone_number_two,
            'gender' => $this->gender == 'm' ? 'm' : 'f',
            'date_of_birth' => $this->date_of_birth,
            'profile_photo_path' => $profilePicturePath
        ]);

        $this->closeSponsorsProfileEditModal();
    }
}

<?php

namespace App\Livewire\Staff;

use App\Models\User;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class ListOfAll extends Component
{   
    use WithPagination;

    public $selectedstaffMembers = [];

    #[Url()]
    public $perPage = 20;
    public $search = '';
    public $orderBy = 'id';
    public $orderAsc = true;

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.staff.list-of-all',[
            'staffMembers' => User::withTrashed()->search($this->search)->orderBy($this->orderBy, $this->orderAsc ? 'asc' : 'desc')->paginate($this->perPage)
        ]);
    }

    public function openstaffMemberProfile($staff_id){
        $this->redirect(route('users.profile', ['staff_id' => $staff_id]), navigate:true);
    }

    public function deselectAll(){
        $this->selectedstaffMembers = [];
    }
}

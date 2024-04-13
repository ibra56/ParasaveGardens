<?php

namespace App\Livewire\Users;

use App\Models\Farmer;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Url;

class FarmersIndex extends Component
{
    use WithPagination;

    public $selectedfarmers = [];
    // public $selectAll = false;
    #[Url()]
    public $perPage = 50;
    public $action;
    public function render()
    {
        return view('livewire.users.farmers-index',[
            'farmers' => Farmer::paginate($this->perPage),
        ]);
    }
}

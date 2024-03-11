<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Layout;
#[Layout('components.layouts.app')]
class AllFarmersListComponent extends Component
{
    public function render()
    {
        return view('livewire.all-farmers-list-component');
    }
}

<?php

namespace App\Http\Livewire\AssignTo;

use Livewire\Component;

class EditComponent extends Component
{
    public $assignto;
    public $division;
    public function render()
    {
        $assignto = $this->assignto;
        $division = $this->division;

        return view('livewire.assign-to.edit-component',compact(['assignto','division']));
    }
}

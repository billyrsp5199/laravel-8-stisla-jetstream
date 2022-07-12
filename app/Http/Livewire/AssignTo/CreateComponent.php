<?php

namespace App\Http\Livewire\AssignTo;

use App\Models\Division;
use Livewire\Component;

class CreateComponent extends Component
{
    public function render()
    {
        $division = Division::orderBy('created_at','desc')->get();
        return view('livewire.assign-to.create-component',compact(['division']));
    }
}

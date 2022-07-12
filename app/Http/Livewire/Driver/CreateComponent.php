<?php

namespace App\Http\Livewire\Driver;

use App\Models\Division;
use Livewire\Component;

class CreateComponent extends Component
{
    public function render()
    {
        $division = Division::orderBy('created_at','desc')->get();
        return view('livewire.driver.create-component',compact(['division']));
    }
}

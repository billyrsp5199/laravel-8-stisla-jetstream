<?php

namespace App\Http\Livewire\Car;

use App\Models\AssignTo;
use App\Models\Division;
use App\Models\Driver;
use Livewire\Component;

class CreateComponent extends Component
{
    public function render()
    {
        $assign = AssignTo::orderBy('created_at','desc')->get();
        $division = Division::orderBy('created_at','desc')->get();
        // dd($division);
        return view('livewire.car.create-component',compact(['assign','division']));
    }
}

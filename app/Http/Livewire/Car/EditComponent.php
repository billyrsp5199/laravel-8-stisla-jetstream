<?php

namespace App\Http\Livewire\Car;

use Livewire\Component;

class EditComponent extends Component
{
    public $car;
    public $assign;
    public $division;
    public function render()
    {
        $car = $this->car;
        $assign = $this->assign;
        $division = $this->division;
        return view('livewire.car.edit-component',compact(['car','assign','division']));
    }
}

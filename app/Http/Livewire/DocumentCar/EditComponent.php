<?php

namespace App\Http\Livewire\DocumentCar;

use Livewire\Component;

class EditComponent extends Component
{
    public $doc;
    public $driver;

    public function render()
    {
        $doc = $this->doc;
        $driver = $this->driver;
        return view('livewire.document-car.edit-component',compact(['doc','driver']));
    }
}

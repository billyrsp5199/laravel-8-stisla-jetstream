<?php

namespace App\Http\Livewire\Driver;

use Livewire\Component;

class EditComponent extends Component
{
    public $driver;
    public $division;
    public function render()
    {
        $data = $this->driver;
        $dv = $this->division;
        // dd($dv);
        return view('livewire.driver.edit-component',compact(['data','dv']));
    }
}

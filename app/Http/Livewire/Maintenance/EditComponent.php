<?php

namespace App\Http\Livewire\Maintenance;

use App\Models\Maintenances;
use Livewire\Component;

class EditComponent extends Component
{
    public $main;
    public $showModal = false;
    public $mainId;
    public function render()
    {
       
        return view('livewire.maintenance.edit-component');
    }

    public function edit($mainId)
    {
        $this->showModal = true;
        $this->mainId = $mainId;
        $this->main = Maintenances::find($mainId);
    }

    public function close()
    {
        $this->showModal = false;
    }
}

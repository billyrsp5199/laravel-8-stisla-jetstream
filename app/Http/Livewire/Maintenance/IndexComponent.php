<?php

namespace App\Http\Livewire\Maintenance;

use App\Models\Maintenances;
use Livewire\Component;
use Livewire\WithPagination;

class IndexComponent extends Component
{
    use WithPagination;
    public $main;
    public $showModal = false;
    public $mainId;

    public function render()
    {
        $main = Maintenances::orderBy('created_at','desc')->get();
        // dd($main);
        return view('livewire.maintenance.index-component',compact(['main']));
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

    public function save()
    {
        $this->validate();

        if (!is_null($this->mainId)) {
            $this->main->save();
        } else {
            Maintenances::create($this->main);
        }
        $this->showModal = false;
    }

}

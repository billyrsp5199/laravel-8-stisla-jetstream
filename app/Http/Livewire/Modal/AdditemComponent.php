<?php

namespace App\Http\Livewire\Modal;

use App\Models\Maintenances_item_list;
use Livewire\Component;

class AdditemComponent extends Component
{
    public $showModal = false;
    public $name = '';
    public $item_la;
    public $item_en;

    protected $listeners = ['openModal'];

    protected $rules = [
        'item_la' => 'required|unique:maintenances_item_lists,items_la',
        'item_en' => 'required|unique:maintenances_item_lists,items_en',
    ];
    public function render()
    {
        return view('livewire.modal.additem-component');
    }

    public function save()
    {
        $this->validate();

        Maintenances_item_list::create([
            'items_la' => $this->item_la,
            'items_en' => $this->item_en
        ]);

        $this->reset('item_la');
        $this->reset('item_en');

        $this->emit('updateItems');
        $this->closeModal();
    }

    public function openModal()
    {
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
    }
}

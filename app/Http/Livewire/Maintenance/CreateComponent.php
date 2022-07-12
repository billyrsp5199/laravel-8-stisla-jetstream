<?php

namespace App\Http\Livewire\Maintenance;

use App\Models\Maintenances;
use App\Models\Maintenances_item_list;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateComponent extends Component
{
    use WithFileUploads;
    public $car;
    public $driver;
    public $main_item;
    public array $categories_item = [];
    public array $categories = [];
    public $nameFileAttached;

    public $itemlist ;

    public $maintenance = [
      'car' => '',  
      'odo_meter' => '',  
      'odo_meter_at' => '',  
      'driver_id' => '',  
      'maintenance_date' => '',  
      'problem_detail' => '',  
      'maintenance_type' => '',  
      'attached' => '',
    ];

    protected $rules = [
        'maintenance.car' => 'required|integer',
        'maintenance.odo_meter' => 'required|integer',
        'maintenance.odo_meter_at' => 'required|integer',
        'maintenance.driver_id' => 'required|integer',
        'maintenance.maintenance_date' => 'required|date_format:d/m/Y',
        'maintenance.problem_detail' => 'required|string',
        'maintenance.maintenance_type' => 'required|string',
        'maintenance.cost' => 'required|integer',
        'maintenance.attached' => 'required|image|max:2048',
    ];

    protected $listeners = ['updateItems' => 'mount'];

    public function mount()
    {
        $this->main_item = Maintenances_item_list::all();
    }
 
    public function render()
    {
        $car = $this->car;
        $driver = $this->driver;
        return view('livewire.maintenance.create-component',compact(['car','driver']));
    }

    public function submitForm()
    {
        // dd($this->maintenance,$this->categories_item);
        // $this->validate();
        // dd($this->validate());
        $date = date("Y-m-d", strtotime(str_replace('/', '-', $this->maintenance['maintenance_date'])));
        // dd($date);

        $main = Maintenances::create([
            'car_id' => $this->maintenance['car'],
            'odo_meter' => $this->maintenance['odo_meter'],
            'report_by' => $this->maintenance['driver_id'],
            'maintenance_date' => $date,
            'maintenance_type' => $this->maintenance['maintenance_type'],
            'odo_meter_at' => $this->maintenance['odo_meter_at'],
            'maintenance_item' => $this->categories_item,
            'cost' => $this->maintenance['cost'],
            'status' => 1,
            'problem_detail' => $this->maintenance['problem_detail'],
           
        ]);
        $this->reset('maintenance');

        toastr()->success(__("Created"), __("Success"), ['timeOut' => 2000]);
        return redirect(route('maintenance.index'));

    }
}

<?php

namespace App\Http\Livewire\DocumentCar;

use App\Models\Car;
use App\Models\Driver;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class CreateComponent extends Component
{
    public function render()
    {
        $car = Car::orderBy('created_at','desc')->whereNotIn('id', DB::table('document_cars')->pluck('car_id'))->get();
        $driver = Driver::orderBy('created_at','desc')->get();
        return view('livewire.document-car.create-component',compact(['car','driver']));
    }
}

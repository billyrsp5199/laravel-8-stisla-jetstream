<?php

namespace App\Http\Controllers;

use App\Models\AssignTo;
use App\Models\Car;
use App\Models\Division;
use Illuminate\Http\Request;
use Uuid;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $car = Car::all();
        $no = 1;
        return view('car.index',compact(['car','no']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('car.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            "model" => ['required','string','max:50'],
            "plate_number" => ['required','string','max:50'],
            "serial_number" => ['required','string','max:150'],
            "engine_number" => ['required','string','max:150'],
            "power_cc" => ['required','integer'],
            "date_start_usage" => ['required','string','date_format:d/m/Y'],
            "assign_to" => ['required','integer'],
            "division_id" => ['required','integer'],
            "condition" => ['required','string'],
            "status" => ['required','string'],
        ]);

        $fileNameTostore = "default.png";
        $path = 'images/'.$fileNameTostore;
        if($request->hasFile('avatar')):
            $request->validate([
                "avatar" => 'required|mimes:jpeg,png,jpg|max:2048',
            ]);

            //upload file
            $filenameWithExt = $request->file('avatar')->getClientOriginalName();
            $extenstion = $request->file('avatar')->getClientOriginalExtension();
            $fileNameTostore = Uuid::generate(4).'.'.$extenstion;
            $path = $request->file('avatar')->move(public_path('images/car/'), $fileNameTostore);
        endif;

        // dd($request->all());

        $c = new Car;
        $c->model = $request->model;
        $c->vehicle = $request->plate_number;
        $c->serial_number = $request->serial_number;
        $c->engine_number = $request->engine_number;
        $c->power_cc = $request->power_cc;
        $c->date_start_usage = date("Y-m-d",strtotime(str_replace('/', '-',$request->date_start_usage)));
        $c->assign_id = $request->assign_to;
        $c->division_id = $request->division_id;
        $c->condition = $request->condition;
        $c->status = $request->status;
        $c->photo_path = $path;

        $c->save();

        toastr()->success(__("Saved"), __("Success"), ['timeOut' => 2000]);
        return redirect(route('car.index'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Car $car)
    {
        $division = Division::all();
        $assign = AssignTo::all();
        // dd($car);
        return view('car.edit',compact(['car','division','assign']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Car $car)
    {
        $request->validate([
            "model" => ['required','string','max:50'],
            "plate_number" => ['required','string','max:50'],
            "serial_number" => ['required','string','max:150'],
            "engine_number" => ['required','string','max:150'],
            "power_cc" => ['required','integer'],
            "date_start_usage" => ['required','string','date_format:d/m/Y'],
            "assign_to" => ['required','integer'],
            "division_id" => ['required','integer'],
            "condition" => ['required','string'],
            "status" => ['required','string'],
        ]);

        if($request->hasFile('avatar')):
            $request->validate([
                "avatar" => 'required|mimes:jpeg,png,jpg|max:2048',
            ]);

            if ($car->photo_path !== "images/default.png") {
                $img_path = public_path($car->photo_path);
                unlink($img_path);
            }

            //upload file
            $filenameWithExt = $request->file('avatar')->getClientOriginalName();
            $extenstion = $request->file('avatar')->getClientOriginalExtension();
            $fileNameTostore = Uuid::generate(4).'.'.$extenstion;
            $pathStoreDB = 'images/car/profile/'.$fileNameTostore;
            $path = $request->file('avatar')->move(public_path('images/car/profile'), $fileNameTostore);

            $car->photo_path = $pathStoreDB;

        endif;

        $car->model = $request->model;
        $car->vehicle = $request->plate_number;
        $car->serial_number = $request->serial_number;
        $car->engine_number = $request->engine_number;
        $car->power_cc = $request->power_cc;
        $car->date_start_usage = date("Y-m-d",strtotime(str_replace('/', '-',$request->date_start_usage)));
        $car->assign_id = $request->assign_to;
        $car->division_id = $request->division_id;
        $car->condition = $request->condition;
        $car->status = $request->status;
        $car->photo_path = $pathStoreDB;

        $car->save();

        toastr()->success(__("Saved"), __("Success"), ['timeOut' => 2000]);
        return redirect(route('car.index'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

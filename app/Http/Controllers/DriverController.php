<?php

namespace App\Http\Controllers;

use App\Models\Division;
use App\Models\Driver;
use Illuminate\Http\Request;
use Uuid;

class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $driver = Driver::all();
        $no = 1;
        return view('driver.index', compact(['driver', 'no']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('driver.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "driver_name_la" => ['required', 'string', 'max:50'],
            "driver_name_en" => ['required', 'string', 'max:50'],
            "phone" => ['required', 'integer'],
            "license_issue_date" => ['required', 'string', 'date_format:d/m/Y'],
            "license_exp_date" => ['required', 'string', 'date_format:d/m/Y'],
            "attached" => ['required', 'mimes:jpeg,png,jpg,pdf', 'max:2048'],
            "division_id" => ['required', 'integer'],
        ]);

        $fileNameTostore = "default.png";
        $pathStoreDB = 'images/'.$fileNameTostore;
        if($request->hasFile('avatar')):
            $request->validate([
                "avatar" => 'required|mimes:jpeg,png,jpg|max:2048',
            ]);

            //upload file
            $filenameWithExt = $request->file('avatar')->getClientOriginalName();
            $extenstion = $request->file('avatar')->getClientOriginalExtension();
            $fileNameTostore = Uuid::generate(4).'.'.$extenstion;
            $pathStoreDB = 'images/driver/profile/'.$fileNameTostore;
            $path = $request->file('avatar')->move(public_path('images/driver/profile'), $fileNameTostore);
        endif;


        //upload file
        $filenameWithExtAttached = $request->file('attached')->getClientOriginalName();
        $extenstionAttached = $request->file('attached')->getClientOriginalExtension();
        $fileNameTostoreAttached = Uuid::generate(4) . '.' . $extenstionAttached;
        $pathStoreDBAttached = 'images/driver/document/'.$fileNameTostoreAttached;
        $pathAttached = $request->file('attached')->move(public_path('images/driver/document/'), $fileNameTostoreAttached);

        $d = new Driver;
        $d->user_id = auth()->user()->id;
        $d->fullname_la = $request->driver_name_la;
        $d->fullname_eng = $request->driver_name_en;
        $d->phone = $request->phone;
        $d->license_issue_date = date("Y-m-d",strtotime(str_replace('/', '-',$request->license_issue_date)));
        $d->license_expire_date = date("Y-m-d",strtotime(str_replace('/', '-',$request->license_exp_date)));
        $d->attached = $pathStoreDBAttached;
        $d->profile_path = $pathStoreDB;
        $d->division_id = $request->division_id;
        $d->created_by = auth()->user()->id;


        $d->save();

        toastr()->success(__("Saved"), __("Success"), ['timeOut' => 2000]);
        return redirect(route('driver.index'));
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
    public function edit(Driver $driver)
    {
        $division = Division::all();
        return view('driver.edit',compact(['driver','division']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Driver $driver)
    {
        $request->validate([
            "driver_name_la" => ['required', 'string', 'max:50'],
            "driver_name_en" => ['required', 'string', 'max:50'],
            "phone" => ['required', 'integer'],
            "license_issue_date" => ['required', 'string', 'date_format:d/m/Y'],
            "license_exp_date" => ['required', 'string', 'date_format:d/m/Y'],
            "division_id" => ['required', 'integer'],
        ]);

         if($request->hasFile('avatar')):
            $request->validate([
                "avatar" => 'required|mimes:jpeg,png,jpg|max:2048',
            ]);

            if ($driver->profile_path !== "images/default.png") {
                $img_path = public_path($driver->profile_path);
                unlink($img_path);
            }

            //upload file
            $filenameWithExt = $request->file('avatar')->getClientOriginalName();
            $extenstion = $request->file('avatar')->getClientOriginalExtension();
            $fileNameTostore = Uuid::generate(4).'.'.$extenstion;
            $pathStoreDB = 'images/driver/profile/'.$fileNameTostore;
            $path = $request->file('avatar')->move(public_path('images/driver/profile'), $fileNameTostore);

            $driver->profile_path = $pathStoreDB;

        endif;

        if($request->hasFile('attached')):
            $request->validate([
                "attached" => 'required|mimes:jpeg,png,jpg,pdf|max:2048',
            ]);
                $img_path = public_path($driver->attached);
                unlink($img_path);
            

            //upload file
            $filenameWithExtAttached = $request->file('attached')->getClientOriginalName();
            $extenstionAttached = $request->file('attached')->getClientOriginalExtension();
            $fileNameTostoreAttached = Uuid::generate(4) . '.' . $extenstionAttached;
            $pathStoreDBAttached = 'images/driver/document/'.$fileNameTostoreAttached;
            $pathAttached = $request->file('attached')->move(public_path('images/driver/document/'), $fileNameTostoreAttached);

            $driver->attached = $pathStoreDBAttached;
        endif;

        $driver->user_id = auth()->user()->id;
        $driver->fullname_la = $request->driver_name_la;
        $driver->fullname_eng = $request->driver_name_en;
        $driver->phone = $request->phone;
        $driver->license_issue_date = date("Y-m-d",strtotime(str_replace('/', '-',$request->license_issue_date)));
        $driver->license_expire_date = date("Y-m-d",strtotime(str_replace('/', '-',$request->license_exp_date)));
       
        
        $driver->division_id = $request->division_id;
        $driver->save();

        toastr()->success(__("Update"), __("Success"), ['timeOut' => 2000]);
        return redirect(route('driver.index'));

       

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Driver $driver)
    {
        if ($driver->profile_path !== "images/default.png") {
            $img_path = public_path($driver->profile_path);
            unlink($img_path);
        }
        if ($driver->attached !== null) {
            $attached_path = public_path($driver->attached);
            unlink($attached_path);
        }
        Driver::destroy($driver->id);

        toastr()->success(__("Delete"), __("Success"), ['timeOut' => 2000]);
        return redirect(route('driver.index'));
    }

    public function getDriver()
    {
        $driver = Driver::orderBy('created_at', 'desc')->get();

        return response()->json($driver, 200);
    }
}

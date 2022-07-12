<?php

namespace App\Http\Controllers;

use App\Models\DocumentCar;
use App\Models\Driver;
use Illuminate\Http\Request;
use Uuid;

class DocumentCarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('car.document.create');
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
            "car" => ['required','integer','max:50'],
            "technical_exp" => ['required','string','date_format:d/m/Y'],
            "register_exp" => ['required','string','date_format:d/m/Y'],
            "yellowbook_exp" => ['required','string','date_format:d/m/Y'],
            "insurance_exp" => ['required','string','date_format:d/m/Y'],
            "tax_road_date" => ['required','string','date_format:d/m/Y'],
            "driver_id" => ['required','integer'],
        ]);

        $filenameWithExtAttached = $request->file('attached')->getClientOriginalName();
        $extenstionAttached = $request->file('attached')->getClientOriginalExtension();
        $fileNameTostoreAttached = Uuid::generate(4) . '.' . $extenstionAttached;
        $pathStoreDBAttached = 'images/car/document/'.$fileNameTostoreAttached;
        $pathAttached = $request->file('attached')->move(public_path('images/car/document/'), $fileNameTostoreAttached);


        $dc = New DocumentCar;
        $dc->car_id = $request->car;
        $dc->technical_inspection_expire = date("Y-m-d",strtotime(str_replace('/', '-',$request->technical_exp)));
        $dc->register_expire = date("Y-m-d",strtotime(str_replace('/', '-',$request->register_exp)));
        $dc->yellowbook_expire = date("Y-m-d",strtotime(str_replace('/', '-',$request->yellowbook_exp)));
        $dc->insurance_exp = date("Y-m-d",strtotime(str_replace('/', '-',$request->insurance_exp)));
        $dc->tax_road_date = date("Y-m-d",strtotime(str_replace('/', '-',$request->tax_road_date)));
        $dc->driver_id =$request->driver_id;
        $dc->remark = $request->remark;
        $dc->updated_by = auth()->user()->id;
        $dc->attached_path = $pathStoreDBAttached;

        $dc->save();

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
        $document = DocumentCar::firstwhere('car_id',$id);
        
      return view('car.document.show',compact(['document']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $driver = Driver::all();
        $doc = DocumentCar::find($id);
        // dd($doc);
        return view('car.document.edit',compact(['doc','driver']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            "technical_exp" => ['required','string','date_format:d/m/Y'],
            "register_exp" => ['required','string','date_format:d/m/Y'],
            "yellowbook_exp" => ['required','string','date_format:d/m/Y'],
            "insurance_exp" => ['required','string','date_format:d/m/Y'],
            "tax_road_date" => ['required','string','date_format:d/m/Y'],
            "driver_id" => ['required','integer'],
        ]);
        // dd($request->driver_id);

        $doc = DocumentCar::where('id',$id)->update([
           'technical_inspection_expire' => date("Y-m-d",strtotime(str_replace('/', '-',$request->technical_exp))),
            'register_expire' => date("Y-m-d",strtotime(str_replace('/', '-',$request->register_exp))),
            'yellowbook_expire' => date("Y-m-d",strtotime(str_replace('/', '-',$request->yellowbook_exp))),
            'tax_road_date' => date("Y-m-d",strtotime(str_replace('/', '-',$request->insurance_exp))),
            'driver_id' => (int)$request->driver_id,
            'remark' => $request->remark,
            'updated_by' => auth()->user()->id,
        ]);
        $last = DocumentCar::find($id);
        // dd($doc);
        // $doc->car_id = $doc->car_id;
        // $doc->technical_inspection_expire = date("Y-m-d",strtotime(str_replace('/', '-',$request->technical_exp)));
        // $doc->register_expire = date("Y-m-d",strtotime(str_replace('/', '-',$request->register_exp)));
        // $doc->yellowbook_expire = date("Y-m-d",strtotime(str_replace('/', '-',$request->yellowbook_exp)));
        // $doc->insurance_exp = date("Y-m-d",strtotime(str_replace('/', '-',$request->insurance_exp)));
        // $doc->tax_road_date = date("Y-m-d",strtotime(str_replace('/', '-',$request->tax_road_date)));
        // $doc->driver_id =$request->driver_id;
        // $doc->remark = $request->remark;
        // $doc->updated_by = auth()->user()->id;

        // $doc->save();

        toastr()->success(__("Saved"), __("Success"), ['timeOut' => 2000]);
        return redirect(route('documentcar.show',$last->car_id));
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

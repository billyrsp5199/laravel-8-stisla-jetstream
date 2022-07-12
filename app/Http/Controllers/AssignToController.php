<?php

namespace App\Http\Controllers;

use App\Models\AssignTo;
use App\Models\Car;
use App\Models\Division;
use Illuminate\Http\Request;
use Uuid;
class AssignToController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $assign = AssignTo::all();
        $no = 1;
        return view('assignto.index',compact(['assign','no']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('assignto.create');
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
            "assign_to_la" => ['required', 'string', 'max:50'],
            "assign_to_en" => ['required', 'string', 'max:50'],
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
            $pathStoreDB = 'images/assignto/profile/'.$fileNameTostore;
            $path = $request->file('avatar')->move(public_path('images/assignto/profile'), $fileNameTostore);
        endif;

        $a = New AssignTo;
        $a->fullname_la = $request->assign_to_la;
        $a->fullname_en = $request->assign_to_en;
        $a->profile_path = $pathStoreDB;
        $a->division_id = $request->division_id;
        $a->created_by = auth()->user()->id;

        $a->save();

        toastr()->success(__("Saved"), __("Success"), ['timeOut' => 2000]);
        return redirect(route('assignto.index'));
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
    public function edit(AssignTo $assignto)
    {
        $division = Division::all();
        // dd($assignto);
        return view('assignto.edit',compact(['division','assignto']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AssignTo $assignto)
    {
        $request->validate([
            "assign_to_la" => ['required', 'string', 'max:50'],
            "assign_to_en" => ['required', 'string', 'max:50'],
            "division_id" => ['required', 'integer'],
        ]);

        if($request->hasFile('avatar')):
            $request->validate([
                "avatar" => 'required|mimes:jpeg,png,jpg|max:2048',
            ]);

            if ($assignto->profile_path !== "images/default.png") {
                $img_path = public_path($assignto->profile_path);
                unlink($img_path);
            }

            //upload file
            $filenameWithExt = $request->file('avatar')->getClientOriginalName();
            $extenstion = $request->file('avatar')->getClientOriginalExtension();
            $fileNameTostore = Uuid::generate(4).'.'.$extenstion;
            $pathStoreDB = 'images/assignto/profile/'.$fileNameTostore;
            $path = $request->file('avatar')->move(public_path('images/assignto/profile'), $fileNameTostore);

            $assignto->profile_path = $pathStoreDB;

        endif;

        $assignto->fullname_la = $request->assign_to_la;
        $assignto->fullname_en = $request->assign_to_en;
        
        $assignto->division_id = $request->division_id;
        $assignto->created_by = auth()->user()->id;

        $assignto->save();

        toastr()->success(__("Saved"), __("Success"), ['timeOut' => 2000]);
        return redirect(route('assignto.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(AssignTo $assignto)
    {
        if ($assignto->profile_path !== "images/default.png") {
            $img_path = public_path($assignto->profile_path);
            unlink($img_path);
        }
        Car::where('assign_id',$assignto->id)->update(['assign_id' => 3]);
        AssignTo::destroy($assignto->id);

        toastr()->success(__("Delete"), __("Success"), ['timeOut' => 2000]);
        return redirect(route('assignto.index'));
    }
}

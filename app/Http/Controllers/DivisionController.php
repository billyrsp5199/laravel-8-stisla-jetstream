<?php

namespace App\Http\Controllers;

use App\Models\Division;
use Illuminate\Http\Request;

class DivisionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $d = Division::all();
        $no = 1;
        // dd($d);
        return view('division.index',compact(['d','no']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function render(Request $request)
    {
        $columns = array(
            0 => 'created_at',
            1 => 'id',
            2 => 'division_la',
            3 => 'division_eng'
        );
       
        $totalData = Division::count();
        $totalFiltered = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

            //no filter
            if ($limit === -1 || $limit === '-1') {
                $search = $request->input('search.value');
                $division = Division::where('division_la', 'LIKE', "%{$search}%")
                    ->orWhere('division_eng', 'LIKE', "%{$search}%")
                    ->orderBy($order,$dir)
                    ->get();
                $totalFiltered = count($division);
            } elseif (empty($request->input('search.value'))) {
                $division = Division::offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
            } else {
                $search = $request->input('search.value');
                $division = Division::where('division_la', 'LIKE', "%{$search}%")
                    ->orWhere('division_eng', 'LIKE', "%{$search}%")
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
                $totalFiltered = count($division);
            }
        

        $data = array();
        if (!empty($division)) {
            $index = $start;
            foreach ($division as $key => $d):
                $del = route('division.destroy', $d->id);

                $nestedData['id'] = $key + 1;
                $nestedData['division_la'] = $d->division_la;
                $nestedData['division_eng'] = $d->division_eng;

                $btn = "<button type='button'
                            onclick='confirmDelete({$d->id} , \"$del\" )'
                            class='dropdown-item'>
                            <i class='fa fa-trash'></i> " . __("Remove") . "
                        </button>";

                $data[] = $nestedData;
                $index++;
                endforeach;
            }
            $json_data = array(
                "recordsTotal" => intval($totalData),
                "recordsFiltered" => intval($totalFiltered),
                "data" => $data,
            );

            echo json_encode($json_data);
            
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd('555');
        $request->validate([
            "division_la" => ['required'],
            "division_eng" => ['required']
        ]);
        
        $d = new Division;
       
        $d->division_la = $request->division_la;
        $d->division_eng = $request->division_eng;
        $d->save();

        toastr()->success(__("Created"), __("Success"), ['timeOut' => 2000]);
        return redirect(route('division.index'));
    }

    public function filterDivision($start, $limit, $order, $dir, $search, $division_la, $division_eng)
    {

            $division = Division::offset($start)
            ->limit($limit)
            ->orderBy($order, $dir)
            ->get();
            // ->toArray();
        

        return $division;
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
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Division $division)
    {
        Division::destroy($division->id);

        toastr()->success(__("Remove"), __("Success"), ['timeOut' => 2000]);
        return redirect(route('division.index'));
    }

    public function getdivision(){

            $division = Division::orderBy('created_at','desc')->get();
    
            return response()->json($division,200);
    }
}

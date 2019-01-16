<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Report;
use App\Photo;
use App\User;
use Illuminate\Support\Facades\Auth;
use DB;
use Illuminate\Support\Facades\Input;


class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if(Auth::user()->role == 1){
            error_log(Auth::user()->role);
            $reports = Report::reportsPerCanton(User::hallOf(Auth::id()));
            //$reports = Report::all();
        }else{
            $reports = Report::getAll();
        }

        return view('report.index', ['reports' => $reports]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('report.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $report = new Report();
        $report->description = $request->input('description');
        $report->place = $request->input('district');
        $report->user_id = Auth::id();
        $report->save();
        if(Input::hasFile('photos')){
            $photo = Input::file('photos');
            $extension = $photo->getClientOriginalExtension();
            $name = time().'.'.$extension;
            $photo->move(public_path().'\photos\\',$name);
            $photo = new Photo();
            $photo->route = '\photos\\'.$name;
            error_log($name);
            $photo->report = $report->id;
            $photo->save();
        }

// se necesiat arreglar esto
//        foreach ($request->file('photos') as $file)
//        {
//            $extension = $file->getClientOriginalExtension();
//            $name = time().'.'.$extension;
//            $file->move('photos/', $name);
//
//            $photo = new Photo();
//            $photo->route = 'photos/'.$name;
//            $photo->report = $report->id;
//            $photo->save();
//        }




        return $this->index();

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
        $report = Report::find($id);
        $place = DB::table('district')->where('districtID','=',$report->place)->get()[0];
        //error_log($place);
       return view('report.show',['report' => $report,'place' => $place]);
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
        $data = $request->all();
        error_log("Se va a actualizar la denuncia con el id: ".$id);
        $report = Report::find($id);
        $report->tracing = $data['tracing'];
        $report->save();
        return redirect('/reports');
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

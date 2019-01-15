<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Report;
use App\Photo;
use Illuminate\Support\Facades\Auth;

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

        $reports = Report::all();

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
        $report->place = $request->input('place');
        $report->user_id = Auth::id();
        $report->save();

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
    public function destroy($id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Report;

class SearchController extends Controller
{
    //
    public function index(Request $request){
        $description = $request->input('search');
        $searchReports = Report::all()->where('description', 'LIKE', $description);

        return view('search.index', ['$searchReports', $searchReports]);
    }
}

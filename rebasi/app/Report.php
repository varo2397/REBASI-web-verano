<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Report extends Model
{
	protected $table = 'report';
    //

    public static function reportsPerCanton($cantonID)
    {
        return DB::select('select * from report inner join district on place = districtID and canton = '.$cantonID.' inner join photo on photo.report = id');
    }

    public static function getAll(){
        return DB::select('select id,description,name,tracing,route,address from report inner join district on place = districtID inner join photo on photo.report = id');
    }
}

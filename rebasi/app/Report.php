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
        return DB::select('select * from report inner join district on place = districtID and canton = '.$cantonID);
    }
}

<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Act_admin extends Model
{
    static function showCust(){
      $table = getdata(DB::table("dummy_db.customer")->select("*"));
       return $table;
    }
}

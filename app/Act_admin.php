<?php

namespace App;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\pustaka\Act_main;

class Act_admin extends Model
{
    static function showCust(){
    //    $table = DB::table("dummy_db.customer")->select("*");
       $get =  DB::getSchemaBuilder()->getColumnListing("dummy_db.customer");
    //    $columns = DB::select('select * from ' . 'dummy_db.customer')->paginate(10);
    //    $get = DB::getSchemaBuilder()->getColumnListing($columns);

       dd($get);
    //    dd($columns);
       foreach ($columns as $value) {
          echo $value->CUST_NAME; }
       die;
    //    return Act_main::getdata("dummy_db.customer", "*");
    }
}

<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
class Act_admin extends Model
{
    
    static function showCust(){

        $query        = 'a.CUST_CITY AS "CUST_CITY", a.CUST_CITY AS "CUSTOMER CITY", a.CUST_CODE AS "CUST_CODE2",a.CUST_CODE AS "CUST_CODE",a.CUST_NAME AS "JUST"';
       
        $data['data'] = DB::table("dummy_db.customer as a")
                            ->leftJoin("dummy_db.agents as b", "a.AGENT_CODE", "=", "b.AGENT_CODE")                                                
                            ->select(DB::raw($query))->paginate(10);
        
        $pdntable = pdntable($query, 
                             array('CUST_CODE'), 
                             array("PROSES|oke|Admin/Actapa/", "POPUP|ngga|form_oke", "POPUP|Iya Deh|Admin/Actitu/")
                            );
        // print_r($pdntable);die; 
        return array_merge($data, $pdntable);
    }
}

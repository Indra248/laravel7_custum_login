<?php

namespace App;

use Illuminate\Support\Facades\DB ;
use Illuminate\Database\Eloquent\Model;
class Act_Security_Auth extends Model
{
     static function Check_Auth($email = '', $pwd = '')
    {  
        $cek      = DB::table('users')->select("email","password")->where("email", "=", $email)->limit('1');
        
        return $cek;
       
    }

    static function GetData($req){
        $emailPOST = $req->input('email');
        $data = DB::table("users")->select("*")->where("email", "=", $emailPOST)->limit('1')->get();
        foreach($data as $key){
        $req->session()->put('data', $key);

        }
      
    //    echo  $req->session()->get('data');die('sini');
    }
}

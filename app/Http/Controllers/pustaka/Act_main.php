<?php

namespace App\Http\Controllers\pustaka;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class Act_main extends Controller
{
    static function getdata($table, $field){
       return $table->paginate(10);
    }
}

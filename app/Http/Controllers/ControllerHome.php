<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use App\Act_admin;
class ControllerHome extends Controller
{
    public function index(){     
        $data['data'] = Act_admin::showCust();

        #++ MODUL TABEL-20
        $pdntable['page']     = (empty($_GET['page']) ? '' : $_GET['page']*10);
        $pdntable['Field']    = ['CUSTOMER NAME', "CUSTOMER CITY"];
        $pdntable['RowNames'] = ['CUST_NAME', "CUST_CITY"];


        return view('Admin/home', array_merge($data, $pdntable));
    }

    public function satu(){
        echo "ada";
    }
}

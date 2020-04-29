<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use App\Act_admin;
class ControllerHome extends Controller
{
    public function index(){
        $data['data'] = Act_admin::showCust();
        $data['test'] = $_GET['page']*3;
        return view('Admin/home', $data);
    }

    public function satu(){
        echo "ada";
    }
}

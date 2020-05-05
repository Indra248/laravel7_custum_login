<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use App\Act_admin;
class ControllerHome extends Controller
{
    public function index(){     
        $data = Act_admin::showCust();
        
        return view('Admin/home',$data);
    }

    public function AddUser(){
        return view('Admin/form_AddUser');
    }

    public function sini(){
        echo Azdgdecrypt($_POST['a']);die;
        return view('Admin/form_AddUser');
    }
}

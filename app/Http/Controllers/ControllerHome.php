<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Session\Session;
class ControllerHome extends Controller
{
    public function index(){
        return view('Admin/home');
    }
}

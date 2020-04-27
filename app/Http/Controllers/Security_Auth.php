<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Act_Security_Auth;
use App\Http\Controllers\pustaka\Azdgcrypt;
use Illuminate\Support\Facades\Auth;
use Session;
class Security_Auth extends Controller
{
    public function form_login()
    {

        return view('login');
    }

    function ActionCheckAuth(Request $req)
    {
        $emailPOST = $req->input('email');
        $pwdPOST   = $req->input('pwd');

        if($emailPOST == ''){
            $req->session()->flash('karena', "email kosong");
            return redirect("Auth/login");
        }else if($pwdPOST == ''){
            $req->session()->flash('karena', "password kosong");
            return redirect("Auth/login");
        }
   
        $checkValidate = Act_Security_Auth::Check_Auth($emailPOST, $pwdPOST);

        $cek1 = $checkValidate->get();
        if(!$cek1->isEmpty()){
            $pwd     = (Azdgcrypt::decrypt($cek1[0]->password) == $pwdPOST ? 1 : 0);

            if($pwd == 1){
                #taruh sessionnya
                Act_Security_Auth::GetData($req);
                return redirect("Admin/home");
            }else if($pwd  == 0){
                $req->session()->flash('karena', "Password Anda salah");
                return redirect("Auth/login");
            }
        }else{
            $req->session()->flash('karena', "email tidak diketahui");
            return redirect("Auth/login");
           
        }
       
    }
}

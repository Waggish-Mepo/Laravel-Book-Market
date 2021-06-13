<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PasswordController extends Controller
{
    public function changePw(){
        return view('Pages.change_password');
    }

    public function updatePw(){
        request()->validate();
        
    }
}

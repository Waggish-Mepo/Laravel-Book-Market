<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PasswordController extends Controller
{
    public function changePw(){
        return view('Admin.change_password');
    }

    public function updatePw(Request $request){
        $request->validate([
            'old_password'=>'required|min:5|max:100',
            'new_password'=>'required|min:5|max:100',
            'confirm_password'=>'required|same:new_password'
            ]);
    
            $current_user=auth()->user();
    
            if(Hash::check($request->old_password,$current_user->password)){
    
                $current_user->update([
                    'password'=>bcrypt($request->new_password)
                ]);
    
                return back()->with('toast_success', 'Password successfully updated.');
                
            }else{
                return redirect()->back()->with('toast_error','Old password does not matched.');
            }
    }
}

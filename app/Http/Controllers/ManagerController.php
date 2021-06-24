<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

use Carbon\Carbon;

class ManagerController extends Controller
{
    public function setting()
    {
        $profile = Profile::first();

        return view('Manager.setting', compact('profile'));
    }

    public function updateProfile(Request $request)
    {
        $setting = Profile::find($request->id_setting);

        $fileName = '';
        if($request->file('file'))
        {
            $file = $request->file('file');
            $fileName = $file->getClientOriginalName();
            $file->move(public_path().'/images', $file->getClientOriginalName());
        } else {
            $fileName = $setting->logo;
        }

        $setting->nama_perusahaan = $request->name;
        $setting->alamat = $request->address;
        $setting->no_tlpn = $request->phone;
        $setting->web = $request->web;
        $setting->logo = $fileName;
        $setting->no_hp = $request->handphone;
        $setting->email = $request->email;
        $setting->updated_at = Carbon::now();

        $execute = $setting->save();

        if($execute){
            return redirect()->back()->with('toast_success', 'Data Berhasil Disimpan');
        } else {
            return redirect()->back()->with('toast_error', 'Data gagal disimpan');
        }
    }

    public function createUser(Request $request) 
    {
        $rules = [
            'email' => 'required|email',
            'address' => 'required',
            'phone' => 'required',
            'status' => 'required',
            'name' => 'required',
            'password' => 'required',
            'level' => 'required',
        ];

        $messages = [
            'email.required' => 'Email yang diisi tidak sesuai',
            'address.required' => 'Alamat wajib diisi',
            'name.min' => 'Nama wajib diisi',
            'password.required' => 'Password wajib diisi',
            'level' => 'Level User wajib diisi',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        $userCreate = User::create([
            'email' => $request->email,
            'password' => $request->password,
            'alamat' => $request->address,
            'status' => $request->status,
            'telepon' => $request->phone,
            'name' => $request->name,
            'level' => $request->level
        ]);

        if ($userCreate) {
            return redirect()->back()->with('toast_success', 'Data berhasil ditambah');
        } else {
            return redirect()->back()->with('toast_error', 'Data gagal ditambah');
        }
    }
}

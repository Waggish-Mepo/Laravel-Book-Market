<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;

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
}

<?php

namespace App\Http\Controllers;

use App\Models\distributor;
use Illuminate\Http\Request;

class DistributorController extends Controller
{
    
    public function pageInputDistributor(){

        $dtDistributor = distributor::all();
        return view('Admin.input_distributor', compact('dtDistributor'));
    }

    public function createDistributor(){
        return view('Admin.create_distributor');
    }

    public function simpanDistributor(Request $request){
        distributor::create([
            'nama_distributor' => $request->nama,
            'alamat' => $request->alamat,
            'telepon' => $request->telepon,
        ]);

        return redirect('pageInputDistributor')->with('toast_success', 'Data Berhasil Disimpan');
    }

    public function editDistributor($id_distributor){

        $dist = distributor::find($id_distributor);

        return view('Admin.edit_distributor', compact('dist'));
    }

    public function updateDistributor(Request $request, $id_distributor){
        $dist = distributor::find($id_distributor);
        $dist->update([
            'nama_distributor' => $request->nama,
            'alamat' => $request->alamat,
            'telepon' => $request->telepon,
        ]);

        return redirect('pageInputDistributor')->with('toast_success', 'Data Berhasil Disimpan');
    }

    public function deleteDistributor($id_distributor){
        $dist = distributor::find($id_distributor);
        $dist->delete();

        return back()->with('info', 'Data Berhasil Dihapus');
    }

}

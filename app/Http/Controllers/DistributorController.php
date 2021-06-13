<?php

namespace App\Http\Controllers;

use App\Models\distributor;
use Illuminate\Http\Request;

class DistributorController extends Controller
{
    
    public function pageInputDistributor(){

        $dtDistributor = distributor::all();
        return view('Pages.input_distributor', compact('dtDistributor'));
    }

    public function createDistributor(){
        return view('Pages.create_distributor');
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

        $dist = distributor::where('id_distributor', $id_distributor)->first();
        // dd($dist);
        return view('Pages.edit_distributor', compact('dist'));
    }

    public function updateDistributor(Request $request, $id_distributor){
        $dist = distributor::where('id_distributor', $id_distributor);
        $dist->update([
            'nama_distributor' => $request->nama,
            'alamat' => $request->alamat,
            'telepon' => $request->telepon,
        ]);

        return redirect('pageInputDistributor')->with('toast_success', 'Data Berhasil Disimpan');
    }

    public function deleteDistributor($id_distributor){
        $dist = distributor::where('id_distributor', $id_distributor);
        $dist->delete();

        return back()->with('info', 'Data Berhasil Dihapus');
    }

}

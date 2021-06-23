<?php
namespace App\Exports;

use App\Models\Supply;
use Maatwebsite\Excel\Concerns\FromCollection;

class AllSupply implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $supplies = Supply::orderBy('tanggal', 'desc')->get();
        $dataSupply = [];
        foreach($supplies as $key => $supply){
            $supply['distributor'] = $supply->distributor;
            $supply['book'] = $supply->book;
            $dataSupply[$key] = $supply;
        }

        return collect($dataSupply);
    }
}

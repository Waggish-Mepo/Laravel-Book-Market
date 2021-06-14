<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tbl_setting_lap')->insert([
            'nama_perusahaan' => 'PT. Mepo Sejahtera',
            'alamat' => 'Jl. Jalan',
            'no_tlpn' => '666-0-78',
            'web' => 'www.waggish-mepo.id',
            'logo' => 'database.jpg',
            'no_hp' => '08973273232',
            'email' => 'mepo@mail.com',
            'updated_at' => Carbon::now(),
            'created_at' => Carbon::now(),
        ]);
        
    }
}

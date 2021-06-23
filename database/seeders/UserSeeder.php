<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'Ketoprak',
                'alamat' => 'Cirebon',
                'telepon' => '4646',
                'status' => 'Fresh',
                'email' => 'ketoprak@gmail.com',
                'password' => Hash::make('ketoprak123'),
                'level' => 'KASIR',
            ],
            [
                'name' => 'Suryo',
                'alamat' => 'Yes',
                'telepon' => '4646',
                'status' => 'Bagus',
                'email' => 'suryomujahid@gmail.com',
                'password' => Hash::make('suryo123'),
                'level' => 'ADMIN',
            ],
            [
                'name' => 'Martabak',
                'alamat' => 'Bangka',
                'telepon' => '4646',
                'status' => 'Manis',
                'email' => 'martabak@gmail.com',
                'password' => Hash::make('martabak123'),
                'level' => 'MANAGER',
            ],
        ];

        foreach($users as $user)
        {
            DB::table('tbl_user')->insert($user);
        }
    }
}

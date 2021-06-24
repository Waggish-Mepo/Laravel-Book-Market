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
                'name' => 'Yoga Pratama',
                'alamat' => 'Jalan Mars',
                'telepon' => '1000',
                'status' => 'Singelillah',
                'email' => 'yoga@gmail.com',
                'password' => Hash::make('12345'),
                'level' => 'kasir',
            ],
            [
                'name' => 'Yoga',
                'alamat' => 'Jalan Pluto',
                'telepon' => '2000',
                'status' => 'Nikah 5 kali',
                'email' => 'yogaa@gmail.com',
                'password' => Hash::make('12345'),
                'level' => 'admin',
            ],
            [
                'name' => 'Agoy',
                'alamat' => 'Jalan Saturnus',
                'telepon' => '3000',
                'status' => 'Duda anak 11',
                'email' => 'yogaaa@gmail.com',
                'password' => Hash::make('12345'),
                'level' => 'manager',
            ],
        ];

        foreach($users as $user)
        {
            DB::table('tbl_user')->insert($user);
        }
    }
}

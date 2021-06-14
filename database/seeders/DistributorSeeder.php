<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class DistributorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        for ($i = 1; $i <= 10; $i++) {
            DB::table('tbl_distributor')->insert([
                'nama_distributor' => $faker->name(),
                'alamat' => $faker->address,
                'telepon' => $faker->phoneNumber,
                'created_at' => $faker->dateTime('now', 'UTC'),
                'updated_at' => $faker->dateTime('now', 'UTC'),
            ]);
        }
    }
}

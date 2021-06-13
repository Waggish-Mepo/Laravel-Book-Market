<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class BookSeeder extends Seeder
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
            DB::table('tbl_buku')->insert([
                'id_buku' => $faker->unique()->numerify('BK#######'),
                'judul' => $faker->word,
                'noisbn' => $faker->isbn13,
                'penulis' => $faker->name,
                'penerbit' => $faker->word,
                'tahun' => $faker->numberBetween(1900, 2020),
                'stok' => $faker->numberBetween(0, 200),
                'harga_pokok' => $faker->numberBetween(10000, 20000),
                'harga_jual' => $faker->numberBetween(22000, 30000),
                'ppn' => 10,
                'diskon' => $faker->numberBetween(1, 50),
                'created_at' => $faker->dateTime('now', 'UTC'),
                'updated_at' => $faker->dateTime('now', 'UTC'),
            ]);
        }
    }
}

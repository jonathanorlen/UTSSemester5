<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Faker\Factory as Faker;

class PegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        $faker = Faker::create();
        for($i=0; $i<=100;$i++){
            DB::table('pegawai')->insert([
                'nama' => $faker->name,
                'tanggal_lahir' => $faker->dateTimeThisCentury()->format('Y-m-d'),
                'kota' => $faker->city,
            ]);
        }
    }
}

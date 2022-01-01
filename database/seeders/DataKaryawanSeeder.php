<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class DataKaryawanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create("id_ID");
        for ($i = 0; $i < 10; $i++) {
            DB::table('data_karyawan')->insert([
                'id_karyawan' => $faker->numerify("######"),
                'nama_karyawan' => $faker->name(),
                'alamat' => $faker->address(),
                'telepon' => $faker->phoneNumber(),
                'created_at' => Carbon::now()->format("Y-m-d H:i:s"),
                'updated_at' => Carbon::now()->format("Y-m-d H:i:s")
            ]);
        }
    }
}

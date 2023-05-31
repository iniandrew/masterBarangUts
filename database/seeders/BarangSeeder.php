<?php

namespace Database\Seeders;

use App\Models\Barang;
use App\Models\Satuan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create('id_ID');

        for ($i = 0; $i <= 20; $i++) {
            Barang::query()->create([
                'kode_barang' => 'B-' . $faker->unique()->randomNumber('3'),
                'nama_barang' => $faker->name,
                'harga_barang' => $faker->numberBetween(1000, 100000),
                'stok_barang' => $faker->numberBetween(1, 100),
                'deskripsi_barang' => $faker->text,
                'satuan_id' => Satuan::query()->inRandomOrder()->first()->id,
            ]);
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\Satuan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SatuanSeeder extends Seeder
{
    protected $satuans = [
        'Unit',
        'Buah',
        'Pasang',
        'Lembar',
        'Keping',
        'Batang',
        'Potong',
        'Tablet',
        'Rim',
        'Karat',
        'Botol',
        'Butir',
        'Roll',
        'Dus',
        'Karung',
        'Koli',
        'Sak',
        'Bal',
        'Kaleng',
        'Set',
        'Slop',
        'Gulung',
        'Ton',
        'KiloGram',
        'Gram',
        'Meter',
        'Liter',
    ];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach ($this->satuans as $satuan) {
            Satuan::query()->create([
                'kode_satuan' => 'S-' . Str::random(3),
                'nama_satuan' => $satuan,
            ]);
        }
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kategori;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $kategoris = [
            [
                'nama_kategori' => 'Komputer & Laptop',
                'deskripsi' => 'Komputer, laptop, dan perangkat pendukung.',
            ],
            [
                'nama_kategori' => 'Perangkat Jaringan',
                'deskripsi' => 'Perangkat untuk kebutuhan jaringan komputer.',
            ],
            [
                'nama_kategori' => 'Alat Perkabelan',
                'deskripsi' => 'Alat dan perlengkapan instalasi kabel jaringan.',
            ],
            [
                'nama_kategori' => 'Multimedia',
                'deskripsi' => 'Perangkat audio, video, dan multimedia.',
            ],
        ];

        foreach ($kategoris as $kategori) {
            Kategori::firstOrCreate(
                ['nama_kategori' => $kategori['nama_kategori']],
                ['deskripsi' => $kategori['deskripsi']]
            );
        }
    }
}
<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // Daftar Kategori Umum
        $kategoris = [
            'Web Development',
            'Mobile Development',
            'Data Science',
            'UI/UX Design',
            'Digital Marketing',
            'DevOps & Network',
            'Soft Skills'
        ];

        $data = [];

        foreach ($kategoris as $kategori) {
            $data[] = [
                'nama_kategori' => $kategori,
                'slug'          => Str::slug($kategori), // Helper untuk bikin slug otomatis (web-development)
                'created_at'    => now(),
                'updated_at'    => now(),
            ];
        }

        // Masukkan ke database
        DB::table('kategori')->insert($data);
    }
}

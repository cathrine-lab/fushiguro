<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kategori;

class KategoriSeeder extends Seeder
{
    public function run(): void
    {
        $kategoris = [
            ['nama_kategori' => 'Programming & Tech', 'deskripsi' => 'Web dev, mobile, AI, DevOps'],
            ['nama_kategori' => 'Design & Creative', 'deskripsi' => 'UI/UX, logo, ilustrasi, video'],
            ['nama_kategori' => 'Writing & Translation', 'deskripsi' => 'Copywriting, artikel, penerjemahan'],
            ['nama_kategori' => 'Business & Marketing', 'deskripsi' => 'SEO, ads, konsultasi bisnis'],
            ['nama_kategori' => 'Music & Audio', 'deskripsi' => 'Produksi musik, mixing, vokal'],
            ['nama_kategori' => 'Teaching & Tutoring', 'deskripsi' => 'Les privat, mentoring, kursus'],
        ];

        foreach ($kategoris as $kat) {
            Kategori::create($kat);
        }
    }
}
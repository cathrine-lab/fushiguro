<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
{
    \App\Models\Pengguna::create([
        'nama'     => 'Admin Utama',
        'email'    => 'yourrmarkk@gmail.com',
        'password' => bcrypt('cigsaftersx5rk'),
        'role'     => 'admin',
        'poin'     => 0,
    ]);
}
}

<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Murid;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);  

        // Murid::insert([
        //     [
        //         'nama' => 'Muhammad Jidan',
        //         'umur' => 19,
        //         'gender' => 'Laki-Laki'
        //     ],
        //     [
        //         'nama' => 'Rafeyfa Zulfiyani',
        //         'umur' => 18,
        //         'gender' => 'Perempuan'
        //     ],
        //     [
        //         'nama' => 'Ahmad Ibrahim',
        //         'umur' => 13,
        //         'gender' => 'Laki-Laki'
        //     ],
        //     [
        //         'nama' => 'Cici',
        //         'umur' => 19,
        //         'gender' => 'Perempuan'
        //     ]
        // ]);
    }
}

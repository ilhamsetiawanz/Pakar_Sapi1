<?php

namespace Database\Seeders;

use App\Models\Aturan;
use Illuminate\Database\Seeder;
use App\Models\Penyakit;
use App\Models\DataGejala;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Sapi',
            'email' => 'sapi@gmail.com',
            'password' => Hash::make('password123'), // Jangan lupa ganti password sesuai keperluan
            'role' => 'user',
        ]);
        // Aturan::insert([
        //     //id 1
        //     ['id_penyakit' => 1, 'id_gejala' => 1],
        //     ['id_penyakit' => 1, 'id_gejala' => 4],
        //     ['id_penyakit' => 1, 'id_gejala' => 9],
        //     ['id_penyakit' => 1, 'id_gejala' => 11],
        //     ['id_penyakit' => 1, 'id_gejala' => 14],
        //     ['id_penyakit' => 1, 'id_gejala' => 18],
        //     ['id_penyakit' => 1, 'id_gejala' => 20],
        //     ['id_penyakit' => 1, 'id_gejala' => 21],
        //     ['id_penyakit' => 1, 'id_gejala' => 43],

        //     // id2
        //     ['id_penyakit' => 2, 'id_gejala' => 5],
        //     ['id_penyakit' => 2, 'id_gejala' => 6],
        //     ['id_penyakit' => 2, 'id_gejala' => 7],
        //     ['id_penyakit' => 2, 'id_gejala' => 8],
        //     ['id_penyakit' => 2, 'id_gejala' => 2],
        //     ['id_penyakit' => 2, 'id_gejala' => 42],
        //     ['id_penyakit' => 2, 'id_gejala' => 53],

        //     // id3
        //     ['id_penyakit' => 3, 'id_gejala' => 1],
        //     ['id_penyakit' => 3, 'id_gejala' => 9],
        //     ['id_penyakit' => 3, 'id_gejala' => 8],
        //     ['id_penyakit' => 3, 'id_gejala' => 10],

        //     // id4
        //     ['id_penyakit' => 4, 'id_gejala' => 11],
        //     ['id_penyakit' => 4, 'id_gejala' => 1],
        //     ['id_penyakit' => 4, 'id_gejala' => 9],
        //     ['id_penyakit' => 4, 'id_gejala' => 12],
        //     ['id_penyakit' => 4, 'id_gejala' => 4],
        //     ['id_penyakit' => 4, 'id_gejala' => 48],
        //     ['id_penyakit' => 4, 'id_gejala' => 50],

        //     // id5
        //     ['id_penyakit' => 5, 'id_gejala' => 13],
        //     ['id_penyakit' => 5, 'id_gejala' => 14],
        //     ['id_penyakit' => 5, 'id_gejala' => 15],
        //     ['id_penyakit' => 5, 'id_gejala' => 33],
        //     ['id_penyakit' => 5, 'id_gejala' => 52],

        //     // id6
        //     ['id_penyakit' => 6, 'id_gejala' => 12],
        //     ['id_penyakit' => 6, 'id_gejala' => 17],
        //     ['id_penyakit' => 6, 'id_gejala' => 2],
        //     ['id_penyakit' => 6, 'id_gejala' => 16],

        //     // id7
        //     ['id_penyakit' => 7, 'id_gejala' => 20],
        //     ['id_penyakit' => 7, 'id_gejala' => 22],
        //     ['id_penyakit' => 7, 'id_gejala' => 41],
        //     ['id_penyakit' => 7, 'id_gejala' => 46],
        //     ['id_penyakit' => 7, 'id_gejala' => 51],

        //     // id8
        //     ['id_penyakit' => 8, 'id_gejala' => 1],
        //     ['id_penyakit' => 8, 'id_gejala' => 24],
        //     ['id_penyakit' => 8, 'id_gejala' => 25],
        //     ['id_penyakit' => 8, 'id_gejala' => 20],
        //     ['id_penyakit' => 8, 'id_gejala' => 4],
        //     ['id_penyakit' => 8, 'id_gejala' => 49],

        //     // id9
        //     ['id_penyakit' => 9, 'id_gejala' => 26],
        //     ['id_penyakit' => 9, 'id_gejala' => 45],
        //     ['id_penyakit' => 9, 'id_gejala' => 27],

        //     // id10
        //     ['id_penyakit' => 10, 'id_gejala' => 8],
        //     ['id_penyakit' => 10, 'id_gejala' => 17],
        //     ['id_penyakit' => 10, 'id_gejala' => 28],
        //     ['id_penyakit' => 10, 'id_gejala' => 29],

        //     // id 11
        //     ['id_penyakit' => 11, 'id_gejala' => 12],
        //     ['id_penyakit' => 11, 'id_gejala' => 30],
        //     ['id_penyakit' => 11, 'id_gejala' => 44],
        //     ['id_penyakit' => 11, 'id_gejala' => 47],

        //     // id12
        //     ['id_penyakit' => 12, 'id_gejala' => 31],
        //     ['id_penyakit' => 12, 'id_gejala' => 32],

        //     // id13
        //     ['id_penyakit' => 13, 'id_gejala' => 19],
        //     ['id_penyakit' => 13, 'id_gejala' => 34],
        //     ['id_penyakit' => 13, 'id_gejala' => 35],
        //     ['id_penyakit' => 13, 'id_gejala' => 39],

        //     // 14
        //     ['id_penyakit' => 14, 'id_gejala' => 22],
        //     ['id_penyakit' => 14, 'id_gejala' => 36],
        //     ['id_penyakit' => 14, 'id_gejala' => 38],
        //     ['id_penyakit' => 14, 'id_gejala' => 40],

        //     // 15
        //     ['id_penyakit' => 15, 'id_gejala' => 23],
        //     ['id_penyakit' => 15, 'id_gejala' => 3],
        //     ['id_penyakit' => 15, 'id_gejala' => 1],
        //     ['id_penyakit' => 15, 'id_gejala' => 37],

        // ]);
    }
}

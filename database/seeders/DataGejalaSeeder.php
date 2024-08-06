<?php

namespace Database\Seeders;

use App\Models\DataGejala;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DataGejalaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DataGejala::query()->create(
            ['KodeGejala' => 'P01', 'NamaGejala' => 'Bovine Ephemeral fever'],
            ['KodeGejala' => 'P02', 'NamaGejala' => 'Bovine Viral Diare'],
            ['KodeGejala' => 'P03', 'NamaGejala' => 'Salmonellosis'],
            ['KodeGejala' => 'P04', 'NamaGejala' => 'Infectious Bovine Rhinoteacthetis'],
            ['KodeGejala' => 'P05', 'NamaGejala' => 'Pink eye'],
            ['KodeGejala' => 'P06', 'NamaGejala' => 'Tympany'],
            ['KodeGejala' => 'P07', 'NamaGejala' => 'Scabies'],
            ['KodeGejala' => 'P08', 'NamaGejala' => 'Septichaemia Efizootica'],
            ['KodeGejala' => 'P09', 'NamaGejala' => 'Mastitis'],
            ['KodeGejala' => 'P10', 'NamaGejala' => 'Helminthiasis'],
            ['KodeGejala' => 'P11', 'NamaGejala' => 'Artritis'],
            ['KodeGejala' => 'P12', 'NamaGejala' => 'Myasis'],
            ['KodeGejala' => 'P13', 'NamaGejala' => 'Distokia'],
            ['KodeGejala' => 'P14', 'NamaGejala' => 'Infestasi Kutu'],
            ['KodeGejala' => 'P15', 'NamaGejala' => 'Cystitis'],
        );
    }
}

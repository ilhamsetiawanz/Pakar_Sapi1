<?php
namespace Database\Seeders;

use App\Models\Aturan;
use App\Models\DataGejala;
use App\Models\Penyakit;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => Hash::make('password123'), // Ganti dengan password yang Anda inginkan
        ]);
    }
}

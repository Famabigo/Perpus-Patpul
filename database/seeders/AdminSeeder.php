<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminSeeder extends Seeder
{
    public function run()
    {
        User::updateOrCreate([
            'email' => 'admin@smk40.test',
        ], [
            'name' => 'Admin Perpustakaan',
            'password' => Hash::make('admin123'), // Ganti password sesuai keinginan
            'role' => 'admin',
            'is_approved' => true,
        ]);
    }
}

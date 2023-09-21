<?php

namespace Database\Seeders;

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Admin Perpus
        User::create([
            'role_id' => 1,
            'user_number' => '00' . rand(10, 90) . rand(101, 199) . rand(200, 999),
            'name' => 'Admin Perpustakaan',
            'image' => 'assets/images/profiles/default.png',
            'email' => 'admin@mail.com',
            'password' => Hash::make('secret'),
            'address' => 'Jl. Manggis',
            'status' => 0
        ]);

        // Operator Perpus
        User::create([
            'role_id' => 2,
            'user_number' => '00' . rand(10, 90) . rand(101, 199) . rand(200, 999),
            'name' => 'Operator Perpustakaan',
            'image' => 'assets/images/profiles/default.png',
            'email' => 'operator@mail.com',
            'password' => Hash::make('secret'),
            'address' => 'Jl. Manggis',
            'status' => 0
        ]);

        // Anggota Perpus
        User::create([
            'role_id' => 3,
            'user_number' => '00' . rand(10, 90) . rand(101, 199) . rand(200, 999),
            'name' => 'Anggota Perpustakaan',
            'image' => 'assets/images/profiles/default.png',
            'email' => 'anggota@mail.com',
            'password' => Hash::make('secret'),
            'address' => 'Jl. Manggis',
            'status' => 0
        ]);

        factory(User::class, 10)->create();
    }
}

<?php

namespace Database\Seeders;

use App\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name' => 'Admin Perpustakaan',
            'description' => 'Admin Perpus'
        ]);

        Role::create([
            'name' => 'Operator Perpustakaan',
            'description' => 'Operator Perpus'
        ]);

        Role::create([
            'name' => 'Anggota Perpustakaan',
            'description' => 'Anggota Perpus'
        ]);
    }
}

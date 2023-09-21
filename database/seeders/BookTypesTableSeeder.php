<?php

namespace Database\Seeders;

use App\BookType;
use Illuminate\Database\Seeder;

class BookTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BookType::create([
            'name' => 'Buku Cetak',
            'description' => 'buku cetak'
        ]);

        BookType::create([
            'name' => 'Dongeng',
            'description' => 'dongeng'
        ]);

        BookType::create([
            'name' => 'Majalah',
            'description' => 'majalah'
        ]);

        BookType::create([
            'name' => 'Ensiklopedia',
            'description' => 'ensiklopedia'
        ]);

        BookType::create([
            'name' => 'Biografi',
            'description' => 'biografi'
        ]);
    }
}

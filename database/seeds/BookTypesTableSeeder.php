<?php

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
            'slug' => 'buku-cetak',
            'description' => 'buku cetak'
        ]);

        BookType::create([
            'name' => 'Dongeng',
            'slug' => 'dongeng',
            'description' => 'dongeng'
        ]);

        BookType::create([
            'name' => 'Majalah',
            'slug' => 'majalah',
            'description' => 'majalah'
        ]);

        BookType::create([
            'name' => 'Ensiklopedia',
            'slug' => 'ensiklopedia',
            'description' => 'ensiklopedia'
        ]);

        BookType::create([
            'name' => 'Biografi',
            'slug' => 'biografi',
            'description' => 'biografi'
        ]);
    }
}

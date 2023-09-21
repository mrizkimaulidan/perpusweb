<?php

namespace Database\Seeders;

use App\Book;
use Illuminate\Database\Seeder;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $books = [
            ['title' => 'Akuntansi Pengantar 1', 'publisher' => 'Gava Media'],
            ['title' => 'Aplikasi Klinis Induk Ovulasi & Stimulasi Ovarium', 'publisher' => 'Sagung Seto'],
            ['title' => 'Kolaborasi PHP 5 & Mysql untuk pengembangan website + cd', 'publisher' => 'Andi Offset'],
            ['title' => 'Manajemen Penerbitan Jurnal Ilmiah', 'publisher' => 'Sagung Seto'],
            ['title' => 'Tan Malaka: Merajut Masyarakat dan pendidikan Indonesia yang Sosialistis', 'publisher' => 'Ar-Ruzz Media'],
            ['title' => 'Busines And Personal Development', 'publisher' => 'Andi Offset'],
            ['title' => 'Mistisisme Hindu Muslim', 'publisher' => 'LKiS'],
            ['title' => 'Pengenalan Dasar-Dasar PLC (Progamable Logic Controler) Disertai Contoh Aplikasinya', 'publisher' => 'Gava Media'],
            ['title' => 'Asal Usul Perang jawa', 'publisher' => 'LKiS'],
            ['title' => 'Ekonomi Rekayasa', 'publisher' => 'Andi'],
            ['title' => 'From Zero to a Pro	', 'publisher' => 'Andi'],
            ['title' => 'Konsumen dan Pelayanan Prima', 'publisher' => 'Gava Media'],
            ['title' => 'Membuat Robot Bersama Profesor Bolabot', 'publisher' => 'Gava Media'],
            ['title' => 'Pemrograman Berorientasi Objek Dengan Java', 'publisher' => 'Gava Media'],
            ['title' => 'Pemrograman C++', 'publisher' => 'Andi'],
            ['title' => 'Pemrograman MATLAB', 'publisher' => 'Andi'],
            ['title' => 'Pendidikan Berwawasan Kebangsaan', 'publisher' => 'LKiS'],
            ['title' => 'Penelitian Ilmu Manajemen', 'publisher' => 'Prenadamedia Grup'],
            ['title' => 'Pengendalian Mobile Robot (MOBOT)', 'publisher' => 'Gava Media'],
            ['title' => 'Pedoman Dasar Anamnesis Dan Pemeriksaan Jasmani', 'publisher' => 'Sagung Seto'],
        ];

        for ($i = 1; $i < count($books); $i++) {
            Book::create([
                'book_type_id' => rand(1, 5),
                'book_number' => 'BUKU-' . rand(10, 90) . rand(101, 199) . rand(200, 999),
                'image' => 'assets/images/books/default.png',
                'title' => $books[$i]['title'],
                'publisher' => $books[$i]['publisher'],
                'date_of_added' => date('Y-m-d'),
                'languages' => "Bahasa Indonesia"
            ]);
        }
    }
}

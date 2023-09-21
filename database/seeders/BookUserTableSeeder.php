<?php

namespace Database\Seeders;

use App\BookUser;
use Illuminate\Database\Seeder;

class BookUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(BookUser::class, 20)->create();
    }
}

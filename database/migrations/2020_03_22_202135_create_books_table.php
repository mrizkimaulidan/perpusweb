<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('book_type_id');
            $table->string('book_number')->unique();
            $table->longText('image');
            $table->string('title');
            $table->string('publisher');
            $table->date('date_of_added');
            $table->string('languages');
            $table->timestamps();

            $table->foreign('book_type_id')->references('id')->on('book_types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
}

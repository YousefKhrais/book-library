<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePublishersTable extends Migration
{
    /**
     * Run the migrations.
     *        $publisher1 = new Publisher();
    $publisher1->id = 0;
    $publisher1->name = "publisher1";
    $publisher1->address = "ps 213 4e dfs";
    $publisher1->website = "google.com";
    $publisher1->books_count = 2;

     * @return void
     */
    public function up()
    {
        Schema::create('publishers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('address');
            $table->string('website');
            $table->integer('books_count');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('publishers');
    }
}

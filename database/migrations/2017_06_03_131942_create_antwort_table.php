<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAntwortTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('antwort', function (Blueprint $table) {
            $table->increments('antwort_id')->unique();
            $table->string('text',1000);
            $table->integer('frage_id')->unsigned();
            $table->integer('user_id')->unsigned();

            $table->foreign('frage_id')->references('frage_id')->on('frage');
            $table->foreign('user_id')->references('user_id')->on('users');

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
        Schema::dropIfExists('antwort');

    }
}

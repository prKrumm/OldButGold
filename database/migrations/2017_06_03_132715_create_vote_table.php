<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVoteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vote', function (Blueprint $table) {
            $table->increments('vote_id')->unique();
            $table->integer('value');
            $table->integer('antwort_id')->unsigned();
            $table->integer('user_id')->unsigned();

            $table->foreign('antwort_id')->references('antwort_id')->on('antwort');
            $table->foreign('user_id')->references('user_id')->on('users');
            $table->timestamps();
            $table->unique(array('antwort_id','user_id'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vote');
    }
}

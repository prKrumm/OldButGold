<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class CreateFzgModellTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('fzg_modell', function (Blueprint $table) {
            $table->increments('fzg_modell_id');
            $table->string('modell');
            $table->integer('hersteller_id')->unsigned();

            $table->foreign('hersteller_id')->references('hersteller_id')->on('hersteller');
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
        Schema::dropIfExists('fzg_modell');
    }
}

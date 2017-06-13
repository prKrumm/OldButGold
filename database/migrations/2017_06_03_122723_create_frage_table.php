<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFrageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('frage', function (Blueprint $table) {
            $table->increments('frage_id')->unique();
            $table->string('titel');
            $table->string('text',1000);
            //Funktion Bilder hochladen aktuell nicht geplant
            $table->string('bild_url');
            $table->string('rubrik');
            $table->integer('fzg_modell_id')->unsigned()->default('');
            $table->integer('user_id')->unsigned()->default('');

            $table->foreign('fzg_modell_id')->references('fzg_modell_id')->on('fzg_modell');
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
        Schema::dropIfExists('frage');
    }
}

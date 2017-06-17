<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKontaktanfrageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Kontaktanfrage', function (Blueprint $table) {
            $table->increments('kontaktanfrage_id')->unique();
            $table->string('titel');
            $table->string('text',1000);
            $table->string('email');
            $table->string('gelesen');
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
        Schema::drop('Kontaktanfrage');
    }
}

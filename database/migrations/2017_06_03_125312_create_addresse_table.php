<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddresseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresse', function (Blueprint $table) {
            $table->increments('addresse_id')->unique();
            $table->string('street');
            $table->string('plz');
            $table->string('ort');
            $table->integer('user_id')->unsigned()->default('')-> unique();

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
        Schema::dropIfExists('addresse');
    }
}

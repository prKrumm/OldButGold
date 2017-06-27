<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserHatThemaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_hat_thema', function (Blueprint $table) {
            $table->integer('thema_id')->unsigned()->default('');
            $table->integer('user_id')->unsigned()->default('');

            $table->foreign('thema_id')->references('thema_id')->on('thema');
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
        Schema::dropIfExists('user_hat_thema');
    }
}

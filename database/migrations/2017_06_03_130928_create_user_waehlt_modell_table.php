<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserWaehltModellTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_waehlt_modell', function (Blueprint $table) {
            $table->integer('fzg_modell_id')->unsigned()->default('');
            $table->integer('user_id')->unsigned()->default('');

            $table->foreign('fzg_modell_id')->references('fzg_modell_id')->on('fzg_modell');
            $table->foreign('user_id')->references('user_id')->on('users');
            $table->timestamps();
        });
        DB::table('user_waehlt_modell')->insert(
            array(
                'fzg_modell_id' => '1',
                'user_id' => '1'
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_waehlt_modell');
    }
}

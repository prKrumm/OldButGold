<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFrageThemaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('frage_gehoert_thema', function (Blueprint $table) {
            $table->integer('thema_id')->unsigned()->default('');
            $table->integer('frage_id')->unsigned()->default('');

            $table->foreign('thema_id')->references('thema_id')->on('thema');
            $table->foreign('frage_id')->references('frage_id')->on('frage');
            $table->timestamps();
        });
        DB::table('frage_gehoert_thema')->insert(
            array(
                'thema_id' => '1',
                'frage_id' => '1'
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
        Schema::dropIfExists('frage_gehoert_thema');
    }
}

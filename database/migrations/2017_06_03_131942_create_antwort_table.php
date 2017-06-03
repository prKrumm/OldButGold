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
            $table->string('text');
            $table->integer('frage_id')->unsigned()->default('');
            $table->integer('user_id')->unsigned()->default('');

            $table->foreign('frage_id')->references('frage_id')->on('frage');
            $table->foreign('user_id')->references('user_id')->on('users');

            $table->timestamps();
        });
        DB::table('antwort')->insert(
            array(
                'text' => 'Müßte lauf Katalog eine Gelenkscheibe sein. Es zeigt 
                im Microfish aber ein Kreuzgelenk für den 180er.',
                'frage_id' => 1,
                'user_id' => 1
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
        Schema::dropIfExists('antwort');

    }
}

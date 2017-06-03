<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThemaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thema', function (Blueprint $table) {
            $table->increments('thema_id');
            $table->string('bezeichnung');

            $table->timestamps();
        });


        DB::table('thema')->insert(
            array(
                array(
                    'bezeichnung' => 'Motor'
                ),
                array(
                    'bezeichnung' => 'Blech'
                ),
                array(
                    'bezeichnung' => 'Kotflügel'
                ),
                array(
                    'bezeichnung' => 'Vergaser'
                ),
                array(
                    'bezeichnung' => 'Sonstiges'
                ),
                array(
                    'bezeichnung' => 'Katalysator'
                )
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
        Schema::dropIfExists('thema');

    }
}

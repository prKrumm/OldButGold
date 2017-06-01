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
            [
                'bezeichnung' => 'Motor'
            ],
            [
                'bezeichnung' => 'Blech'
            ],
            [
                'bezeichnung' => 'Kotflügel'
            ],
            [
                'bezeichnung' => 'Vergaser'
            ],
            [
                'bezeichnung' => 'Sonstiges'
            ]
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

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
        Schema::create('kontaktanfrage', function (Blueprint $table) {
            $table->increments('kontaktanfrage_id')->unique();
            $table->string('titel');
            $table->string('text',1000);
            $table->string('email');
            $table->string('gelesen');
            $table->timestamps();
        });

        //Kontaktanfrage
        DB::table('kontaktanfrage')->insert(
            array(
                array(
                    'titel' => 'Feedback Homepage',
                    'text' => 'Hallo liebes OldButGold-Team, herzlichen Glückwunsch zu eurer tollen Homepage! Einfach klasse! Viele Grüße Olaf',
                    'email' => 'olaf@web.de',
                    'gelesen' => '0'
                ),
                array(
                    'titel' => 'OldButGold ist Klasse',
                    'text' => 'Hallo liebes OldButGold-Team,

super Idee! Endlich finde ich das was ich wirklich suche.

Viele Grüße
Olaf',
                    'email' => 'oliver@web.de',
                    'gelesen' => '0'
                ),
                array(
                    'titel' => 'E-Mail Kontakt',
                    'text' => 'Hallo liebes OldButGold-Team,

TextExt’s modular design allows you easily turn a standard HTML text input into a wide range of modern, tailored to your needs input field without bloating your source code and slowing down your site with the code that you aren’t using.

A wide number of plugins are available including Tags, Autocomplete, Filter, Ajax as well as a few which are purely aesthetic like Focus.
Viele Grüße
Olaf',
                    'email' => 'theo@web.de',
                    'gelesen' => '0'
                ),
                array(
                    'titel' => 'Feedback Homepage',
                    'text' => 'Hallo liebes OldButGold-Team, herzlichen Glückwunsch zu eurer tollen Homepage! Einfach klasse! Viele Grüße Olaf',
                    'email' => 'olaf@web.de',
                    'gelesen' => '0'
                ),
                array(
                    'titel' => 'Homepage auch in der Schweiz',
                    'text' => 'TextExt’s modular design allows you easily turn a standard HTML text input into a wide range of modern, tailored to your needs input field without bloating your source code and slowing down your site with the code that you aren’t using.

A wide number of plugins are available including Tags, Autocomplete, Filter, Ajax as well as a few which are purely aesthetic like Focus.',
                    'email' => 'hubert@web.de',
                    'gelesen' => '0'
                ),
                array(
                    'titel' => 'Feedback Homepage',
                    'text' => 'Hallo liebes OldButGold-Team, herzlichen Glückwunsch zu eurer tollen Homepage! Einfach klasse! Viele Grüße Olaf',
                    'email' => 'mike@web.de',
                    'gelesen' => '0'
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
        Schema::drop('kontaktanfrage');
    }
}

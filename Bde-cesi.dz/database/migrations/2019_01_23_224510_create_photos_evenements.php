<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhotosEvenements extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photos_evenements', function (Blueprint $table) {
            $table->increments('id');
            $table->string('path');
            $table->unsignedInteger('id_utilisateur');
            $table->foreign('id_utilisateur')->references('id')->on('users');
            
            $table->unsignedInteger('id_evenement');
            $table->foreign('id_evenement')->references('id')->on('evenements');
            $table->boolean('signal_photo');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('photos_evenements');
    }
}

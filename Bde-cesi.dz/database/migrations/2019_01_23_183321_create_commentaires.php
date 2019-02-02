<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentaires extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commentaires', function (Blueprint $table) {
            $table->increments('id');
            $table->string('contenu');
            $table->boolean('signal_com');
            $table->unsignedInteger('id_utilisateur');
            $table->foreign('id_utilisateur')->references('id')->on('users');
            $table->Integer('publie');
            $table->unsignedInteger('evenement_id');
            $table->foreign('id_evenement')->references('id')->on('evenements');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('commentaires');
    }
}
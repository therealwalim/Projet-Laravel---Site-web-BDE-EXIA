<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommandeProduitTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commande_produit', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_commande');
            $table->unsignedInteger('id_produit');
            $table->unsignedInteger('Quantite_Pro');

            $table->foreign('id_commande')->references('id')->on('commandes');
            $table->foreign('id_produit')->references('id')->on('produits');

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
        Schema::dropIfExists('commande_produit');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('factures', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('client')->nullable();
            $table->integer('idClient')->nullable();
            $table->date('dateFacturation')->nullable();
            $table->string('numeroFacture')->nullable();
            $table->date('dateEcheance')->nullable();
            $table->integer('numeroCommande')->nullable();
            $table->text('articles')->nullable();
            $table->integer('prixHT')->nullable();
            $table->integer('prixTTC')->nullable();
            $table->string('envoye')->default('non');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('factures');
    }
}

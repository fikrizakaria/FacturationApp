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
            $table->string('client')->default(null);
            $table->string('idClient')->default(null);
            $table->string('dateFacturation')->default(null);
            $table->string('numeroFacture')->default(null);
            $table->string('dateEcheance')->default(null);
            $table->string('numeroCommande')->default(null);
            $table->text('articles')->default(null);
            $table->string('prixHT')->default(null);
            $table->string('prixTTC')->default(null);
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

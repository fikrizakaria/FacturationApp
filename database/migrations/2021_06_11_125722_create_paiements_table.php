<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaiementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paiements', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('idClient');
            $table->integer('idFacture');
            $table->date('date')->nullable();
            $table->integer('montant')->default(0);
            $table->integer('credit')->default(0);
            $table->string('compte')->nullable();
            $table->string('devise')->nullable();
            $table->text('description')->nullable();
            $table->string('mode')->nullable();
            $table->string('reference')->nullable();
            $table->boolean('importe')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('paiements');
    }
}

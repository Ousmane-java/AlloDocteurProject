<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('rendez_vouses', function (Blueprint $table) {
            $table->id();
            $table->string('nomprenomPatient');
            $table->string('email');
            $table->unsignedBigInteger('idMedecin');
            $table->string('prenomMedecin');
            $table->string('nomMedecin');
            $table->string('contactMedecin');
            $table->string('specialite');
            $table->string('localite');
            $table->date('date');
            $table->time('heure');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rendez_vouses');
    }
};

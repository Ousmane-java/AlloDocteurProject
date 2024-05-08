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
            $table->string('prestation');
            $table->unsignedBigInteger('idMedecin');
            $table->date('date');
            $table->time('heure');
            $table->string('nomPatient');
            $table->string('prenomPatient');
            $table->string('emailPatient');
            $table->string('telephonePatient');
            $table->timestamps();

            $table->foreign('idMedecin')->references('id')->on('medecins')->onDelete('cascade');;
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

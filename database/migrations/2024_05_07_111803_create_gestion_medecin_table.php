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
        Schema::create('gestion_medecin', function (Blueprint $table) {
            $table->unsignedBigInteger('idAdmin');
            $table->unsignedBigInteger('idMedecin');
            $table->boolean('autorisation_ajout')->default(false);
            $table->boolean('autorisation_suppression')->default(false);
            $table->boolean('autorisation_modification')->default(false);
            $table->timestamps();

            $table->primary(['idAdmin', 'idMedecin']);
            $table->foreign('idAdmin')->references('id')->on('admins')->onDelete('cascade');
            $table->foreign('idMedecin')->references('id')->on('medecins')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gestion_medecin');
    }
};

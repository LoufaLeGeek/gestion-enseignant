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
        Schema::create('enseignant_departements', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['PER', 'VACATAIRE']);
            $table->string('grade')->nullable();
            $table->date('date_affectation')->nullable();
            $table->boolean('actif')->default(true);
            $table->foreignId('id_enseignant')
                ->constrained('enseignants')
                ->onDelete('restrict');
            $table->foreignId('id_departement')
                ->constrained('departements')
                ->onDelete('restrict');
            $table->unique(['id_enseignant', 'id_departement']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enseignant_departements');
    }
};

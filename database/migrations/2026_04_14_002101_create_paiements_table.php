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
        Schema::create('paiements', function (Blueprint $table) {
            $table->id();
            $table->date('periode_debut');
            $table->date('periode_fin');
            $table->integer('total_heures');
            $table->decimal('montant', 10, 2);
            $table->enum('statut', ['GENERE', 'VALIDE', 'REJETE'])->default('GENERE');
            $table->date('date_generation');

            $table->foreignId('id_enseignant')
                ->constrained('enseignants')
                ->cascadeOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paiements');
    }
};

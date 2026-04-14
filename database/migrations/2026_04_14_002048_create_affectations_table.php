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
        Schema::create('affectations', function (Blueprint $table) {
            $table->id();
            $table->string('type_cours');
            $table->integer('volume_affecte');
            $table->integer('volume_effectue')->nullable();
            $table->enum('statut', ['EN_ATTENTE', 'VALIDEE', 'REJETEE'])->default('EN_ATTENTE');

            $table->text('commentaire_admin')->nullable();
            $table->text('commentaire_enseignant')->nullable();

            $table->decimal('taux_horaire_snapshot', 10, 2);

            $table->foreignId('id_matiere')->constrained('matieres');
            $table->foreignId('id_enseignant_departement')->constrained('enseignant_departements');
            $table->foreignId('id_contrat')->constrained('contrats');
            $table->foreignId('id_annee_academique')->constrained('annee_academiques');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('affectations');
    }
};

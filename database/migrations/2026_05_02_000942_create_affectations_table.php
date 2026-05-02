<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\EnseignantDepartement;
use App\Models\Matiere;
use App\Models\AnneeAcademique;
use App\Models\Contrat;


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
            $table->integer('volume_heure_affecte');
            $table->integer('volume_heure_effectue')->default(0);
            $table->date('date_affectation');
            $table->string('statut')->default('EN_ATTENTE');   
            $table->text('commentaire_admin')->nullable();
            $table->text('commentaire_enseignant')->nullable();
            $table->decimal('taux_horaire_snapshot', 10, 2)->nullable();
            $table->foreignIdFor(EnseignantDepartement::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Matiere::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(AnneeAcademique::class)->nullable()->constrained()->nullOnDelete();
            $table->foreignIdFor(Contrat::class)->nullable()->constrained()->nullOnDelete();
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

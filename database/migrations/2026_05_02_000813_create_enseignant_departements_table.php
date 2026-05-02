<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Enseignant;
use App\Models\Departement;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('enseignant_departements', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Enseignant::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Departement::class)->constrained()->cascadeOnDelete();
            $table->string('type');          
            $table->string('grade');         
            $table->boolean('actif')->default(true); 
            $table->date('date_affectation')->nullable();
            $table->timestamps();
            $table->unique(['enseignant_id', 'departement_id']);
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

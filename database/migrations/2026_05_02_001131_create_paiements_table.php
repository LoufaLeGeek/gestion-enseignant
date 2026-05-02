<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Affectation;

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
            $table->decimal('total_heures', 10, 2)->default(0);
            $table->decimal('montant', 15, 2)->default(0);
            $table->string('statut')->default('BROUILLON');
            $table->dateTime('date_generation')->nullable();
            $table->foreignIdFor(Affectation::class)->constrained()->cascadeOnDelete();
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

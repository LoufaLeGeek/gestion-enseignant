<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('enseignants', function (Blueprint $table) {
            $table->id();
            $table->string('matricule')->unique();
            $table->string('telephone')->nullable();
            $table->string('rib')->nullable();
            $table->string('specialite')->nullable();
            $table->integer('plafond_horaire_annuel')->default(0);
            $table->date('date_recrutement')->nullable();
            $table->boolean('actif')->default(true);
            $table->foreignIdFor(User::class)->nullable()->unique()->constrained()->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enseignants');
    }
};

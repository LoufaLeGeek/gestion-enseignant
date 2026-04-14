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
        Schema::create('matieres', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->string('intitule');
            $table->float('volume_cm')->default(0);
            $table->float('volume_td')->default(0);
            $table->enum('semestre', ['S1', 'S2', 'S3', 'S4', 'S5', 'S6']);
            $table->boolean('actif')->default(true);
            $table->foreignId('id_filiere')
                ->constrained('filieres')
                ->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('matieres');
    }
};

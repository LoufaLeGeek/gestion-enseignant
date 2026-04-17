<?php

use Illuminate\Support\Facades\Route;

// ROUTES ADMIN
Route::prefix("admin")->name("admin.")->group(function () {
    Route::livewire("/users", "pages::admin.users")->name("users");
    Route::livewire("/roles", "pages::admin.roles")->name("roles");
});


// ROUTES RESPONSABLE
Route::prefix("responsable")->name("responsable.")->group(function () {
    Route::livewire("/enseignants", "pages::responsable.enseignants")->name("enseignants");
    Route::livewire("/affectations", "pages::responsable.affectations")->name("affectations");
    Route::livewire("/departements", "pages::responsable.departements")->name("departements");
    Route::livewire("/matieres", "pages::responsable.matieres")->name("matieres");
    Route::livewire("/filieres", "pages::responsable.filieres")->name("filieres");
});

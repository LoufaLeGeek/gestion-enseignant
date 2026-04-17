<?php

use Illuminate\Support\Facades\Route;

// ROUTES ADMIN
Route::prefix("admin")->name("admin.")->group(function () {
    Route::livewire("/users", "pages::admin.users")->name("users");
    Route::livewire("/roles", "pages::admin.roles")->name("roles");
});

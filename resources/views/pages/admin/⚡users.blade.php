<?php

use Livewire\Component;
use Livewire\Attributes\Layout;

new #[Layout("layouts::admin", ["title" => 'Gestion des utilsateurs', 'breadcrumb' => 'Gestion des utilisateurs'])]
    class extends Component {
    //
};
?>

<div class="space-y-4">

    <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 mb-8">
        {{-- Titre et Compteur --}}
        <x-shared.header-page title="Gestion des utilisateurs" nbre="004"
            description="Administrez les rôles, les accès et les informations du personnel." />

        {{-- Ajouter un utilisateur --}}
        <livewire:users.create-user />
    </div>


    {{-- Filter --}}
    <div class="flex flex-wrap items-center gap-3">

        {{-- Barre de recherche --}}
        <label class="group lg:shadow-none label-wrapper">
            <x-heroicon-o-magnifying-glass
                class="h-4 w-4 text-text-muted transition-colors group-focus-within:text-primary" />
            <input required placeholder="Rechercher..." class="input-wrapper" />
        </label>

        {{-- Groupe de Filtres + Reset --}}
        <div class="flex flex-wrap items-center gap-2">
            @php
                $filters = [
                    ['label' => 'Admin', 'border' => 'border-role-admin-border', 'text' => 'text-role-admin-text'],
                    ['label' => 'Enseignant', 'border' => 'border-role-teacher-border', 'text' => 'text-role-teacher-text'],
                    ['label' => 'Responsable', 'border' => 'border-role-manager-border', 'text' => 'text-role-manager-text'],
                    ['label' => 'Comptable', 'border' => 'border-role-accountant-border', 'text' => 'text-role-accountant-text'],
                ];
            @endphp

            @foreach($filters as $filter)
                <button
                    class="h-9 px-4 rounded-xl flex items-center justify-center bg-base-200 border-2 {{ $filter['border'] }}
                                {{ $filter['text'] }} text-[11px] font-bold uppercase tracking-widest hover:bg-base-100 hover:scale-105 active:scale-95 transition-all">
                    {{ $filter['label'] }}
                </button>
            @endforeach
        </div>

        {{-- Bouton RESET --}}
        <button title="Réinitialiser les filtres" class="h-9 w-9 flex items-center justify-center rounded-xl
                       bg-base-200 text-text-muted border border-transparent
                       hover:bg-base-100 hover:border-base-300 hover:text-error
                       active:scale-90 transition-all duration-200">
            <x-heroicon-o-arrow-path class="h-4 w-4" />
        </button>
    </div>

    @php

        $testUsers = collect([
            (object) [
                'id' => '1',
                'name' => 'Fallou Thiam',
                'email' => 'fallou@gmail.com',
                'role' => 'admin',
                'date' => '25 Avril 2002'
            ],
            (object) [
                'id' => '2',
                'name' => 'Marie Curie',
                'email' => 'marie@science.fr',
                'role' => 'enseignant',
                'date' => '12 Nov 2023'
            ],
            (object) [
                'id' => '3',
                'name' => 'Jean Responsable',
                'email' => 'jean@ecole.com',
                'role' => 'responsable',
                'date' => '01 Jan 2024'
            ],
            (object) [
                'id' => '4',
                'name' => 'Awa Diop',
                'email' => 'awa@compta.sn',
                'role' => 'comptable',
                'date' => '15 Mars 2024'
            ],
        ]);
    @endphp
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
        @foreach ($testUsers as $user)
            <livewire:users.card-user :user="$user" :wire:key="$user->id" />
        @endforeach
    </div>


    <style>
        /* Pour cacher la barre de scroll tout en gardant le défilement tactile */
        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }

        .no-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>


</div>
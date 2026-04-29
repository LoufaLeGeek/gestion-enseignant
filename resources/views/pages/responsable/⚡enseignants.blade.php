<?php

use Livewire\Component;

use Livewire\Attributes\Layout;

new #[Layout("layouts::responsable", ["title" => 'Répertoire du Corps Enseignant', 'breadcrumb' => 'Effectifs & Profils'])]
    class extends Component {
    //
};

?>

<div class="space-y-4">
    <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 mb-8">
        {{-- Titre et Compteur --}}
        <x-shared.header-page title="Gestion des Affectations des Enseignants"
            description="Attribution des enseignants aux départements et organisation selon leur régime de travail (Permanent / Vacataire)." />
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">

        {{-- Global --}}
        <livewire:shared.card-kpi label="Total Enseignants" value="150" subtext="Effectif global inscrit"
            icon="heroicon-o-users" iconBg="bg-tint-primary" iconColor="text-primary" textColor="text-primary" />

        {{-- Permanents (PER) --}}
        <livewire:shared.card-kpi label="Permanents (PER)" value="85" subtext="Personnel titulaire"
            icon="heroicon-o-academic-cap" iconBg="bg-green-100" iconColor="text-green-600"
            textColor="text-green-700" />

        {{-- Vacataires (VAC) --}}
        <livewire:shared.card-kpi label="Vacataires" value="45" subtext="Personnel extérieur"
            icon="heroicon-o-briefcase" iconBg="bg-amber-100" iconColor="text-amber-600" textColor="text-amber-700" />

        {{-- Non assignés (Sans type) --}}
        <livewire:shared.card-kpi label="En attente" value="20" subtext="Statut non défini"
            icon="heroicon-o-exclamation-triangle" iconBg="bg-red-100" iconColor="text-red-600"
            textColor="text-red-700" />
    </div>

    <div class="flex flex-wrap items-center gap-3 ">

        {{-- Barre de recherche (Ton style préservé avec wire:model) --}}
        <label class="group lg:shadow-none label-wrapper">
            <x-heroicon-o-magnifying-glass
                class="h-4 w-4 text-text-muted transition-colors group-focus-within:text-primary" />
            <input wire:model.live="search" required placeholder="Rechercher un enseignant..." class="input-wrapper" />
        </label>

        {{-- Groupe de Filtres + Reset (Structure Intacte) --}}
        <div class="flex flex-wrap items-center gap-2">
            @php
                $filters = [
                    [
                        'label' => 'Permanents',
                        'icon' => 'heroicon-o-academic-cap',
                        'border' => 'border-slate-200',
                        'text' => 'text-slate-600'
                    ],
                    [
                        'label' => 'Vacataires',
                        'icon' => 'heroicon-o-briefcase',
                        'border' => 'border-slate-200',
                        'text' => 'text-slate-600'
                    ],
                    [
                        'label' => 'Sans Type',
                        'icon' => 'heroicon-o-exclamation-circle',
                        'border' => 'border-slate-200',
                        'text' => 'text-slate-600'
                    ],
                ];
            @endphp

            <div class="flex flex-wrap gap-2.5">
                @foreach($filters as $filter)
                    <button
                        class="h-9 px-5 rounded-xl flex items-center justify-center gap-2 bg-base-100 border-2 {{ $filter['border'] }} 
                                               {{ $filter['text'] }} text-[11px] font-bold uppercase tracking-widest 
                                               hover:border-primary/30 hover:text-primary hover:-translate-y-1 active:scale-95 transition-all duration-300 group">

                        {{-- Icône dynamique correspondante --}}
                        <x-dynamic-component :component="$filter['icon']"
                            class="h-4 w-4 opacity-70 group-hover:scale-110 group-hover:text-primary transition-all" />

                        <span>{{ $filter['label'] }}</span>
                    </button>
                @endforeach

                {{-- Bouton RESET --}}
                <button title="Réinitialiser les filtres" class="h-9 w-9 flex items-center justify-center rounded-xl
                   bg-base-200 text-text-muted border border-transparent
                   hover:bg-base-100 hover:border-base-300 hover:text-error
                   active:scale-90 transition-all duration-200">
                    <x-heroicon-o-arrow-path class="h-4 w-4" />
                </button>
            </div>
        </div>
    </div>

    <div>
        @php
            $enseignants = collect([
                (object) [
                    'id' => 1,
                    'prenom' => 'Mamadou',
                    'nom' => 'Diop',
                    'matricule' => 'PERM-2024-001',
                    'email' => 'm.diop@universite.sn',
                    'grade' => 'Professeur Titulaire',
                    'specialite' => 'Intelligence Artificielle',
                    'telephone' => '+221 77 123 45 67',
                    'plafond_horaire' => 192,
                    'actif' => true,
                    'initials' => 'MD'
                ],
                (object) [
                    'id' => 2,
                    'prenom' => 'Fatou',
                    'nom' => 'Sow',
                    'matricule' => 'VAC-2024-082',
                    'email' => 'f.sow@gmail.com',
                    'grade' => 'Maître de Conférences',
                    'specialite' => 'Base de Données',
                    'telephone' => '+221 70 987 65 43',
                    'plafond_horaire' => 96,
                    'actif' => true,
                    'initials' => 'FS'
                ],
                (object) [
                    'id' => 3,
                    'prenom' => 'Jean-Pierre',
                    'nom' => 'Gomez',
                    'matricule' => 'PERM-2023-014',
                    'email' => 'jp.gomez@universite.sn',
                    'grade' => 'Assistant',
                    'specialite' => 'Réseaux & Télécoms',
                    'telephone' => '+221 76 543 21 00',
                    'plafond_horaire' => 160,
                    'actif' => false,
                    'initials' => 'JG'
                ],
                (object) [
                    'id' => 4,
                    'prenom' => 'Awa',
                    'nom' => 'Ndiaye',
                    'matricule' => 'NEW-2026-005',
                    'email' => 'a.ndiaye@yahoo.fr',
                    'grade' => null, // Test du badge "SANS GRADE"
                    'specialite' => 'Cybersécurité',
                    'telephone' => '+221 77 555 11 22',
                    'plafond_horaire' => 0,
                    'actif' => true,
                    'initials' => 'AN'
                ],
                (object) [
                    'id' => 5,
                    'prenom' => 'Ibrahima',
                    'nom' => 'Fall',
                    'matricule' => 'VAC-2025-110',
                    'email' => 'i.fall@outlook.com',
                    'grade' => 'Doctorant',
                    'specialite' => 'Développement Web',
                    'telephone' => '+221 78 444 33 22',
                    'plafond_horaire' => 45,
                    'actif' => true,
                    'initials' => 'IF'
                ],
                (object) [
                    'id' => 6,
                    'prenom' => 'Marie-Louise',
                    'nom' => 'Faye',
                    'matricule' => 'PERM-2022-009',
                    'email' => 'ml.faye@universite.sn',
                    'grade' => 'Maître-Assistant',
                    'specialite' => 'Mathématiques Appliquées',
                    'telephone' => '+221 77 666 99 88',
                    'plafond_horaire' => 192,
                    'actif' => true,
                    'initials' => 'MF'
                ]
            ]);
        @endphp

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($enseignants as $enseignant)
                <livewire:responsable.card-enseignant :enseignant="$enseignant" :key="$enseignant->id" />
            @endforeach
        </div>
    </div>

</div>
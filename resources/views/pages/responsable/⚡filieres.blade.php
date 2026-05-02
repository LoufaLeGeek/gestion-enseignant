<?php

use Livewire\Component;

use Livewire\Attributes\Layout;

new #[Layout("layouts::responsable", ["title" => 'Architecture des Études', 'breadcrumb' => 'Pilotage des Filières et des matieres'])]
    class extends Component {
    //
};
?>

<div>
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-8">

        {{-- HEADER --}}
        <x-shared.header-page title="Gestion des Filières et Matières"
            description="Organisation des parcours académiques : création des filières et structuration des matières." />

        {{-- ACTION (DROITE) --}}
        <div class="w-full sm:w-auto flex justify-start sm:justify-end">
            <livewire:responsable.create-filiere />
        </div>

    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">

        {{-- FILIÈRES --}}
        <livewire:shared.card-kpi label="Filières" value="16" subtext="Parcours académiques actifs"
            icon="heroicon-o-academic-cap" iconBg="bg-emerald-100" iconColor="text-emerald-600"
            textColor="text-emerald-700" />

        {{-- MATIÈRES --}}
        <livewire:shared.card-kpi label="Matières" value="48" subtext="Unités d’enseignement"
            icon="heroicon-o-book-open" iconBg="bg-indigo-100" iconColor="text-indigo-600"
            textColor="text-indigo-700" />

        {{-- VOLUME HORAIRE TOTAL --}}
        <livewire:shared.card-kpi label="Volume Horaire" value="1 280H" subtext="CM / TD / TP cumulés"
            icon="heroicon-o-clock" iconBg="bg-blue-100" iconColor="text-blue-600" textColor="text-blue-700" />

    </div>

    <div class="flex flex-wrap items-center justify-between gap-3 mb-4">

        {{-- Barre de recherche (Ton style préservé avec wire:model) --}}
        <label class="group lg:shadow-none label-wrapper">
            <x-heroicon-o-magnifying-glass
                class="h-4 w-4 text-text-muted transition-colors group-focus-within:text-primary" />
            <input wire:model.live="search" required placeholder="Rechercher un enseignant..." class="input-wrapper" />
        </label>

        {{-- SORT BUTTONS --}}
        <div class="flex items-center gap-2">

            {{-- ASC --}}
            <button wire:click="sortAsc" class="h-10 w-10 flex items-center justify-center rounded-xl
                   bg-base-100 border border-base-300
                   hover:border-primary/30 hover:text-primary
                   hover:-translate-y-0.5 active:scale-95
                   transition-all duration-200" title="Tri croissant">

                <x-heroicon-o-bars-arrow-up class="h-5 w-5" />

            </button>

            {{-- DESC --}}
            <button wire:click="sortDesc" class="h-10 w-10 flex items-center justify-center rounded-xl
                   bg-base-100 border border-base-300
                   hover:border-primary/30 hover:text-primary
                   hover:-translate-y-0.5 active:scale-95
                   transition-all duration-200" title="Tri décroissant">

                <x-heroicon-o-bars-arrow-down class="h-5 w-5" />

            </button>

            {{-- RESET --}}
            <button wire:click="resetFilters" class="h-10 w-10 flex items-center justify-center rounded-xl
                   bg-base-200 text-base-content/60
                   hover:bg-base-100 hover:text-error
                   active:scale-90 transition-all duration-200" title="Réinitialiser">

                <x-heroicon-o-arrow-path class="h-5 w-5" />

            </button>

        </div>

    </div>

    @php
        $filieres = collect([
            [
                'id' => 1,
                'nom' => 'Informatique Fondamentale',
                'niveau' => 'Licence',
                'description' => 'Formation axée sur les bases de l’informatique : algorithmique, programmation, structures de données et systèmes.',
                'departement' => 'Informatique',
                'matiere_count' => 6,
                'created_at' => '12 Jan 2024',
            ],
            [
                'id' => 2,
                'nom' => 'Génie Logiciel',
                'niveau' => 'Licence',
                'description' => 'Conception, développement et maintenance des systèmes logiciels complexes.',
                'departement' => 'Informatique',
                'matiere_count' => 8,
                'created_at' => '18 Jan 2024',
            ],
            [
                'id' => 3,
                'nom' => 'Mathématiques Appliquées',
                'niveau' => 'Master',
                'description' => 'Étude des modèles mathématiques appliqués à l’ingénierie et aux sciences.',
                'departement' => 'Mathématiques',
                'matiere_count' => 7,
                'created_at' => '25 Jan 2024',
            ],
            [
                'id' => 4,
                'nom' => 'Physique Fondamentale',
                'niveau' => 'Licence',
                'description' => 'Étude des lois fondamentales de la physique classique et moderne.',
                'departement' => 'Physique',
                'matiere_count' => 5,
                'created_at' => '02 Fév 2024',
            ],
            [
                'id' => 5,
                'nom' => 'Biotechnologie',
                'niveau' => 'Master',
                'description' => 'Application des sciences biologiques aux technologies modernes.',
                'departement' => 'Biologie',
                'matiere_count' => 9,
                'created_at' => '10 Fév 2024',
            ],
        ]);
    @endphp

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">

        @foreach ($filieres as $filiere)
            <livewire:responsable.card-filiere :filiere="$filiere" :key="$filiere['id']" />
        @endforeach

    </div>

</div>
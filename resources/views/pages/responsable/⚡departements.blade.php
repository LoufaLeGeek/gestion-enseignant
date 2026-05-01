<?php

use Livewire\Component;

use Livewire\Attributes\Layout;

new #[Layout("layouts::responsable", ["title" => 'Unités Administratives', 'breadcrumb' => 'Configuration Départements'])]
    class extends Component {
    public $departements = [
        [
            "id" => 1,
            "nom" => "Informatique",
            "description" => "Département dédié aux sciences informatiques, algorithmique, développement logiciel et systèmes d'information.",
            "created_at" => "12 Jan 2024",
        ],
        [
            "id" => 2,
            "nom" => "Mathématiques",
            "description" => "Département couvrant l’analyse, l’algèbre, les probabilités et les mathématiques appliquées.",
            "created_at" => "18 Jan 2024",
        ],
        [
            "id" => 3,
            "nom" => "Physique",
            "description" => "Étude des phénomènes naturels, mécanique, électricité, optique et physique moderne.",
            "created_at" => "25 Jan 2024",
        ],
        [
            "id" => 4,
            "nom" => "Chimie",
            "description" => "Département axé sur la chimie organique, inorganique et analytique.",
            "created_at" => "02 Fév 2024",
        ],
        [
            "id" => 5,
            "nom" => "Biologie",
            "description" => "Étude des organismes vivants, génétique, microbiologie et biotechnologie.",
            "created_at" => "10 Fév 2024",
        ],
    ];
};
?>

<div class="space-y-4">
    <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 mb-6">
        <x-shared.header-page title="Gestion des Départements" description="Organisation des départements académiques"
            nbre="005" />
        <livewire:responsable.create-departement />
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">

        {{-- Départements --}}
        <livewire:shared.card-kpi label="Départements" value="5" subtext="Structures académiques"
            icon="heroicon-o-building-office-2" iconBg="bg-blue-100" iconColor="text-blue-600"
            textColor="text-blue-700" />

        {{-- Filières --}}
        <livewire:shared.card-kpi label="Filières" value="16" subtext="Parcours de formation"
            icon="heroicon-o-academic-cap" iconBg="bg-emerald-100" iconColor="text-emerald-600"
            textColor="text-emerald-700" />

        {{-- Matières --}}
        <livewire:shared.card-kpi label="Matières" value="48" subtext="Unités d’enseignement"
            icon="heroicon-o-book-open" iconBg="bg-indigo-100" iconColor="text-indigo-600"
            textColor="text-indigo-700" />


    </div>


    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">



        @foreach ($departements as $d)
            <livewire:responsable.card-departement :departement="$d" :key="$d['id']" />
        @endforeach



    </div>

</div>
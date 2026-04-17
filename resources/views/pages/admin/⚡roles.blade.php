<?php

use Livewire\Component;

use Livewire\Attributes\Layout;

new #[Layout("layouts::admin", ["title" => 'Gestion des roles', 'breadcrumb' => 'Rôles & permissions'])]
    class extends Component {
    //
};
?>

<div class="space-y-4">

    <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 mb-8">
        {{-- Titre et Compteur --}}
        <x-shared.header-page title="Gestion des utilisateurs" nbre="004"
            description="Administrez les rôles, les accès et les informations du personnel." />
    </div>


    {{-- Section KPIs : Vue d'ensemble --}}
    {{-- Section KPIs : Valeurs Fixes --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

        {{-- KPI 1 : Valeur brute 150 --}}
        <livewire:shared.card-kpi label="Total Enseignants" value="150" subtext="Effectif de l'UFR"
            icon="heroicon-o-users" iconBg="bg-tint-primary" iconColor="text-primary" textColor="text-primary" />

        {{-- KPI 2 : Valeur brute 2450h --}}
        <livewire:shared.card-kpi label="Volume Horaire" value="2 450 h" subtext="Prévisions annuelles"
            icon="heroicon-o-briefcase" iconBg="bg-info/10" iconColor="text-info-content"
            textColor="text-info-content" />

        {{-- KPI 3 : Valeur brute 12 --}}
        <livewire:shared.card-kpi label="Dossiers Incomplets" value="12" subtext="Spécialités manquantes"
            icon="heroicon-o-document-magnifying-glass" iconBg="bg-logout-bg" iconColor="text-logout-text"
            textColor="text-logout-text" badgeLabel="À traiter" badgeBg="bg-logout-bg" badgeDot="bg-error" />

        {{-- KPI 4 : Valeur brute 85% --}}
        <livewire:shared.card-kpi label="Taux d'Activité" value="85%" subtext="Personnel opérationnel"
            icon="heroicon-o-bolt" iconBg="bg-accent/10" iconColor="text-accent-content" textColor="text-accent-content"
            :progress="85" />
    </div>

    <div class="flex flex-wrap items-center gap-3 pt-8">

        {{-- Barre de recherche (Style Intact) --}}
        <label class="group lg:shadow-none label-wrapper">
            <x-heroicon-o-magnifying-glass
                class="h-4 w-4 text-text-muted transition-colors group-focus-within:text-primary" />
            <input required placeholder="Rechercher..." class="input-wrapper" />
        </label>

        {{-- Groupe de Filtres + Reset (Structure Intacte) --}}
        <div class="flex flex-wrap items-center gap-2">
            @php
                $filters = [
                    [
                        'label' => 'Quota Élevé',
                        'icon' => 'heroicon-o-bars-arrow-down',
                        'border' => 'border-border-primary-light',
                        'text' => 'text-primary'
                    ],
                    [
                        'label' => 'Quota Faible',
                        'icon' => 'heroicon-o-bars-arrow-up',
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
                                           hover:bg-base-200 hover:-translate-y-1 active:scale-95 transition-all duration-300 group">

                        {{-- Icône dynamique correspondante --}}
                        <x-dynamic-component :component="$filter['icon']"
                            class="h-4 w-4 opacity-70 group-hover:scale-110 transition-transform" />

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
            // Simulation d'une collection d'enseignants

            $enseignants = collect([
                (object) [
                    'id' => 1,
                    'prenom' => 'Jean-Paul',
                    'nom' => 'Ndiaye',
                    'matricule' => 'PERM-2024-001',
                    'type' => 'permanent',
                    'specialite' => 'Algorithmique',
                    'telephone' => '+221 77 123 45 67',
                    'dateRecrutement' => '2024-01-15',
                    'plafond_horaire' => 160,
                    'actif' => true,
                    'initials' => 'JN'
                ],
                (object) [
                    'id' => 2,
                    'prenom' => 'Aïssatou',
                    'nom' => 'Sow',
                    'matricule' => 'VAC-2026-012',
                    'type' => 'vacataire',
                    'specialite' => 'Développement PHP',
                    'telephone' => '+221 70 987 65 43',
                    'dateRecrutement' => '2026-02-10',
                    'plafond_horaire' => 45,
                    'actif' => true,
                    'initials' => 'AS'
                ],
                (object) [
                    'id' => 3,
                    'prenom' => 'Thomas',
                    'nom' => 'Bernard',
                    'matricule' => 'NEW-2026-005',
                    'type' => null,
                    'specialite' => 'Intelligence Artificielle',
                    'telephone' => '+221 76 555 44 33',
                    'dateRecrutement' => '2026-04-01',
                    'plafond_horaire' => 0,
                    'actif' => true,
                    'initials' => 'TB'
                ],
                (object) [
                    'id' => 4,
                    'prenom' => 'Moussa',
                    'nom' => 'Diop',
                    'matricule' => 'PERM-2023-045',
                    'type' => 'permanent',
                    'specialite' => 'Mathématiques',
                    'telephone' => '+221 77 444 22 11',
                    'dateRecrutement' => '2023-09-12',
                    'plafond_horaire' => 140,
                    'actif' => false,
                    'initials' => 'MD'
                ],
                (object) [
                    'id' => 5,
                    'prenom' => 'Sophie',
                    'nom' => 'Martin',
                    'matricule' => 'VAC-2026-089',
                    'type' => 'vacataire',
                    'specialite' => 'Design UI/UX',
                    'telephone' => '+221 78 111 00 99',
                    'dateRecrutement' => '2026-03-20',
                    'plafond_horaire' => 25,
                    'actif' => true,
                    'initials' => 'SM'
                ]
            ])
        @endphp


        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($enseignants as $enseignant)
                <livewire:users.card-enseignant :enseignant="$enseignant" :key="$enseignant->id" />
            @endforeach
        </div>
    </div>




</div>
<?php

use Livewire\Component;
use Livewire\Attributes\Layout;

new #[Layout("layouts::responsable", ["title" => 'Répartition des Charges Horaires', 'breadcrumb' => 'Attributions CM / TD'])]
    class extends Component {
}
?>

<div class="space-y-4">

    {{-- HEADER --}}
    <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 mb-6">
        <x-shared.header-page title="Affectation des Enseignants aux Cours (CM / TD)"
            description="Répartition des enseignants selon les types de cours (Cours Magistraux et Travaux Dirigés) en fonction de leur statut et de leur département." />
        <livewire:responsable.create-affectation />
    </div>

    {{-- KPI --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">

        <livewire:shared.card-kpi label="Volume CM" value="450H" subtext="Cours Magistraux affectés"
            icon="heroicon-o-presentation-chart-bar" iconBg="bg-blue-100" iconColor="text-blue-600"
            textColor="text-blue-700" />

        <livewire:shared.card-kpi label="Volume TD" value="820H" subtext="Travaux Dirigés affectés"
            icon="heroicon-o-user-group" iconBg="bg-indigo-100" iconColor="text-indigo-600"
            textColor="text-indigo-700" />

        <livewire:shared.card-kpi label="Total Effectué" value="315H" subtext="Heures réalisées"
            icon="heroicon-o-check-badge" iconBg="bg-emerald-100" iconColor="text-emerald-600"
            textColor="text-emerald-700" />

        <livewire:shared.card-kpi label="Affectations" value="128" subtext="Fiches de service"
            icon="heroicon-o-clipboard-document-check" iconBg="bg-purple-100" iconColor="text-purple-600"
            textColor="text-purple-700" />

    </div>

    {{-- DONNEES --}}
    @php $affectations = collect([['id' => 1, 'prenom' => 'Fallou', 'nom' => 'Thiam', 'matricule' => 'ENS-001', 'departement' => 'Informatique', 'filiere' => 'L2 Informatique', 'matiere' => 'Algorithmique', 'type_enseignant' => 'PER', 'type_cours' => 'CM', 'volume_affecte' => 40, 'volume_effectue' => 28, 'statut' => 'EN_ATTENTE', 'avatar_color' => 'blue',], ['id' => 2, 'prenom' => 'Awa', 'nom' => 'Mbaye', 'matricule' => 'ENS-042', 'departement' => 'Mathématiques', 'filiere' => 'L1 Mathématiques', 'matiere' => 'Analyse 1', 'type_enseignant' => 'VAC', 'type_cours' => 'TD', 'volume_affecte' => 30, 'volume_effectue' => 30, 'statut' => 'VALIDE', 'avatar_color' => 'green',], ['id' => 3, 'prenom' => 'Mamadou', 'nom' => 'Sarr', 'matricule' => 'ENS-017', 'departement' => 'Physique', 'filiere' => 'L3 Physique', 'matiere' => 'Mécanique Quantique', 'type_enseignant' => 'PER', 'type_cours' => 'TP', 'volume_affecte' => 24, 'volume_effectue' => 8, 'statut' => 'REJETE', 'avatar_color' => 'amber',], ['id' => 4, 'prenom' => 'Ndéye', 'nom' => 'Diop', 'matricule' => 'ENS-089', 'departement' => 'Chimie', 'filiere' => 'L2 Chimie', 'matiere' => 'Chimie Organique', 'type_enseignant' => 'VAC', 'type_cours' => 'CM', 'volume_affecte' => 36, 'volume_effectue' => 36, 'statut' => 'TERMINE', 'avatar_color' => 'purple',], ['id' => 5, 'prenom' => 'Ibrahima', 'nom' => 'Ba', 'matricule' => 'ENS-033', 'departement' => 'Informatique', 'filiere' => 'L1 Informatique', 'matiere' => 'Programmation Web', 'type_enseignant' => 'PER', 'type_cours' => 'TD', 'volume_affecte' => 20, 'volume_effectue' => 12, 'statut' => 'EN_ATTENTE', 'avatar_color' => 'blue',], ['id' => 6, 'prenom' => 'Fatou', 'nom' => 'Ndiaye', 'matricule' => 'ENS-056', 'departement' => 'Biologie', 'filiere' => 'L2 Biologie', 'matiere' => 'Génétique', 'type_enseignant' => 'VAC', 'type_cours' => 'TP', 'volume_affecte' => 18, 'volume_effectue' => 6, 'statut' => 'EN_ATTENTE', 'avatar_color' => 'green',], ['id' => 7, 'prenom' => 'Ousmane', 'nom' => 'Fall', 'matricule' => 'ENS-071', 'departement' => 'Mathématiques', 'filiere' => 'L3 Mathématiques', 'matiere' => 'Algèbre Linéaire', 'type_enseignant' => 'PER', 'type_cours' => 'CM', 'volume_affecte' => 45, 'volume_effectue' => 45, 'statut' => 'TERMINE', 'avatar_color' => 'blue',],]); @endphp

    {{-- TOOLBAR + TABLE --}}
    <div class="space-y-5">
        <div class="flex flex-wrap items-center gap-3">

            {{-- Barre de recherche --}}
            <label class="group lg:shadow-none label-wrapper">
                <x-heroicon-o-magnifying-glass
                    class="h-4 w-4 text-text-muted transition-colors group-focus-within:text-primary" />
                <input required placeholder="Rechercher..." class="input-wrapper" />
            </label>

            {{-- Exporter --}}
            <button class="h-8.5 px-3 rounded-xl border border-base-300
                               bg-base-100 text-[11px] font-medium
                               flex items-center gap-1.5
                               hover:bg-base-200 active:scale-[0.98]
                               transition w-full sm:w-auto justify-center sm:justify-start">

                <x-heroicon-o-arrow-down-tray class="h-4 w-4 text-base-content/60" />
                Exporter
            </button>
        </div>

        {{-- TABLE --}}
        <div class="overflow-x-auto rounded-xl border border-base-200">

            <table class="table table-sm w-full">

                <thead class="text-xs uppercase text-base-content/60 bg-base-100">
                    <tr>
                        <th class="w-8 text-center"></th>
                        <th class="text-left">Enseignant</th>
                        <th class="text-center">Type</th>
                        <th class="text-left">Pédagogie</th>
                        <th class="text-left">Annee</th>
                        <th class="text-right">Volume</th>
                        <th class="text-center">Statut</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($affectations as $a)

                        @php
                            $initiales = strtoupper(substr($a['prenom'], 0, 1) . substr($a['nom'], 0, 1));
                            $pct = $a['volume_affecte'] > 0
                                ? round(($a['volume_effectue'] / $a['volume_affecte']) * 100)
                                : 0;
                        @endphp

                        <tr class="hover">

                            <td class="text-center">
                                <input type="checkbox" class="checkbox checkbox-xs" />
                            </td>

                            <td>
                                <div class="flex items-center gap-3">
                                    <div
                                        class="w-8 h-8 rounded-full bg-linear-to-br from-primary to-primary-end text-base-100 flex items-center justify-center text-[12px] font-semibold">
                                        {{ $initiales }}
                                    </div>
                                    <div>
                                        <div class="font-semibold">
                                            {{ $a['prenom'] }} {{ $a['nom'] }}
                                        </div>
                                        <div class="text-xs opacity-50">
                                            {{ $a['matricule'] }}
                                        </div>
                                    </div>
                                </div>
                            </td>

                            <td class="text-center">
                                @if ($a['type_enseignant'] == 'PER')
                                    <x-heroicon-o-user class="w-4 h-4 text-primary mx-auto" />
                                @else
                                    <x-heroicon-o-clock class="w-4 h-4 text-warning mx-auto" />
                                @endif
                            </td>

                            <td>
                                <div class="flex flex-col leading-tight">
                                    <span class="font-medium">
                                        {{ $a['filiere'] }} / {{ $a['matiere'] }}
                                    </span>
                                    <span class="text-xs opacity-60">
                                        {{ $a['departement'] }}
                                    </span>
                                </div>
                            </td>

                            <td class="text-left">
                                <div class="badge badge-sm badge-neutral badge-soft">2021-2002</div>
                            </td>

                            <td class="text-right">
                                <div class="flex flex-col items-end gap-1">
                                    <div class="text-[11px]">
                                        <span class="font-semibold">{{ $a['volume_affecte'] }}h</span>
                                        <span class="opacity-50"> / {{ $a['volume_effectue'] }}h</span>
                                    </div>

                                    <div class="w-full h-1 bg-base-300 rounded-full overflow-hidden">
                                        <div class="h-full bg-primary" style="width: {{ min($pct, 100) }}%"></div>
                                    </div>
                                </div>
                            </td>

                            <td class="text-center">
                                <span class="badge badge-primary badge-soft badge-sm">
                                    {{ $a['statut'] }}
                                </span>
                            </td>

                            <td class="text-center">
                                <div class="flex items-center justify-center gap-1.5">
                                    <button
                                        class="h-7.5 w-7.5 flex items-center justify-center rounded-lg
                                                               bg-tint-primary border border-border-primary-light
                                                               hover:opacity-80 active:scale-95 transition-all duration-150">
                                        <x-heroicon-o-pencil-square class="h-3.5 w-3.5 text-primary" />
                                    </button>
                                    <button wire:confirm="Supprimer cette affectation ?"
                                        class="h-7.5 w-7.5 flex items-center justify-center rounded-lg
                                                               bg-logout-bg border border-logout-border
                                                               hover:opacity-80 active:scale-95 transition-all duration-150">
                                        <x-heroicon-o-trash class="h-3.5 w-3.5 text-logout-text" />
                                    </button>
                                </div>
                            </td>

                        </tr>

                    @endforeach
                </tbody>

            </table>

        </div>

    </div>

</div>
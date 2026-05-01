<?php

use Livewire\Component;

new class extends Component {

    public $professeurs = [];
    public $matieres = [];

    public $professeur_id;
    public $matiere;
    public $type_cours;
    public $annee_academique;

    public $volume_affecte = 0;
    public $volume_effectue = 0;

    public function mount()
    {
        // Professeurs fictifs
        $this->professeurs = [
            ['id' => 1, 'prenom' => 'Fallou', 'nom' => 'Thiam', 'departement' => 'Informatique'],
            ['id' => 2, 'prenom' => 'Awa', 'nom' => 'Mbaye', 'departement' => 'Mathématiques'],
            ['id' => 3, 'prenom' => 'Mamadou', 'nom' => 'Sarr', 'departement' => 'Physique'],
            ['id' => 4, 'prenom' => 'Ndéye', 'nom' => 'Diop', 'departement' => 'Chimie'],
        ];

        // Matières fictives
        $this->matieres = [
            ['id' => 1, 'nom' => 'Algorithmique'],
            ['id' => 2, 'nom' => 'Programmation Web'],
            ['id' => 3, 'nom' => 'Analyse 1'],
            ['id' => 4, 'nom' => 'Algèbre Linéaire'],
            ['id' => 5, 'nom' => 'Mécanique'],
        ];

        $this->volume_effectue = 0;
    }

    public function save()
    {
        $this->validate([
            'professeur_id' => 'required',
            'matiere' => 'required',
            'type_cours' => 'required',
            'annee_academique' => 'required',
            'volume_affecte' => 'required|numeric|min:1',
        ]);

        session()->flash('success', 'Affectation créée avec succès.');

        $this->reset([
            'professeur_id',
            'matiere',
            'type_cours',
            'annee_academique',
            'volume_affecte',
        ]);

        $this->volume_effectue = 0;

        $this->dispatch('close-modal');
    }
};
?>

<div>

    {{-- BOUTON --}}
    <button onclick="create_affectation.showModal()" class="group relative flex items-center gap-2 h-11 px-6 rounded-2xl
               bg-linear-to-br from-primary to-primary-end
               text-base-100 shadow-md hover:shadow-lg hover:-translate-y-0.5 
               active:scale-95 transition-all duration-200 cursor-pointer">

        <x-heroicon-o-plus class="h-5 w-5 group-hover:scale-110 transition-transform" />

        <span class="text-sm font-bold tracking-wide">
            Nouvelle affectation
        </span>

        <div class="absolute inset-0 rounded-2xl bg-base-100/10 opacity-0 group-hover:opacity-100 transition-opacity">
        </div>
    </button>

    {{-- MODAL --}}
    <dialog id="create_affectation" class="modal modal-bottom sm:modal-middle">

        <div class="modal-box p-0 overflow-auto border-none shadow-2xl">

            {{-- HEADER --}}
            <x-shared.header-modal title="Créer une affectation"
                subtitle="Associer un enseignant à une matière et un type de cours." icon="heroicon-o-arrows-right-left"
                tint="bg-primary/10" border="border-primary/20" text="text-primary" />

            {{-- BODY --}}
            <div class="p-6">

                <form wire:submit.prevent="save" class="w-full">

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                        {{-- PROFESSEUR --}}
                        <div class="md:col-span-2">
                            <x-shared.select-field label="Professeur" name="professeur_id" icon="heroicon-o-user"
                                wire:model="professeur_id">

                                <option value="">Choisir un professeur...</option>

                                @foreach ($professeurs as $p)
                                    <option value="{{ $p['id'] }}">
                                        {{ $p['prenom'] }} {{ $p['nom'] }} ({{ $p['departement'] }})
                                    </option>
                                @endforeach

                            </x-shared.select-field>

                            {{-- INFO AUTO DEPARTEMENT --}}
                            @if($professeur_id)
                                <p class="text-xs text-base-content/50 mt-1">
                                    Département :
                                    {{ collect($professeurs)->firstWhere('id', $professeur_id)['departement'] }}
                                </p>
                            @endif
                        </div>

                        {{-- MATIERE --}}
                        <x-shared.select-field label="Matière" name="matiere" icon="heroicon-o-book-open"
                            wire:model="matiere">

                            <option value="">Choisir une matière...</option>

                            @foreach ($matieres as $m)
                                <option value="{{ $m['id'] }}">
                                    {{ $m['nom'] }}
                                </option>
                            @endforeach

                        </x-shared.select-field>

                        {{-- TYPE COURS --}}
                        <x-shared.select-field label="Type de cours" name="type_cours" icon="heroicon-o-squares-2x2"
                            wire:model="type_cours">

                            <option value="">Choisir...</option>
                            <option value="CM">Cours Magistral (CM)</option>
                            <option value="TD">Travaux Dirigés (TD)</option>
                            <option value="TP">Travaux Pratiques (TP)</option>

                        </x-shared.select-field>

                        {{-- ANNEE --}}
                        <div class="md:col-span-2">
                            <x-shared.select-field label="Année académique" name="annee_academique"
                                icon="heroicon-o-calendar-days" wire:model="annee_academique">

                                <option value="">Choisir une année...</option>
                                <option value="2023-2024">2023 - 2024</option>
                                <option value="2024-2025">2024 - 2025</option>
                                <option value="2025-2026">2025 - 2026</option>
                                <option value="2026-2027">2026 - 2027</option>

                            </x-shared.select-field>
                        </div>

                        {{-- VOLUME AFFECTE --}}
                        <x-shared.input-field label="Volume horaire affecté" name="volume_affecte" type="number"
                            icon="heroicon-o-clock" placeholder="Ex: 30" wire:model="volume_affecte" />

                        {{-- VOLUME EFFECTUE --}}
                        <x-shared.input-field label="Volume horaire effectué" name="volume_effectue" type="number"
                            icon="heroicon-o-check-circle" wire:model="volume_effectue" readonly />

                        {{-- SUBMIT --}}
                        <div class="md:col-span-2 pt-2">
                            <x-shared.btn-submit target="save" icon="heroicon-o-check" class="w-full">

                                Créer l'affectation
                            </x-shared.btn-submit>
                        </div>

                    </div>

                </form>
            </div>
        </div>

        {{-- BACKDROP --}}
        <form method="dialog" class="modal-backdrop">
            <button>close</button>
        </form>

    </dialog>

</div>
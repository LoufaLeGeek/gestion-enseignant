<?php

use Livewire\Component;

new class extends Component {
    public $professeurs = [];

    public $professeur_id;
    public $departement;
    public $matiere;
    public $type_cours;

    public $volume_affecte = 0;
    public $volume_effectue = 0;

    public function mount()
    {
        // Données fictives
        $this->professeurs = [
            ['id' => 1, 'prenom' => 'Fallou', 'nom' => 'Thiam', 'departement' => 'Informatique'],
            ['id' => 2, 'prenom' => 'Awa', 'nom' => 'Mbaye', 'departement' => 'Mathématiques'],
            ['id' => 3, 'prenom' => 'Mamadou', 'nom' => 'Sarr', 'departement' => 'Physique'],
            ['id' => 4, 'prenom' => 'Ndéye', 'nom' => 'Diop', 'departement' => 'Chimie'],
        ];

        $this->volume_effectue = 0;
    }

    public function save()
    {
        // Simulation de sauvegarde
        $this->validate([
            'professeur_id' => 'required',
            'departement' => 'required',
            'matiere' => 'required',
            'type_cours' => 'required',
            'volume_affecte' => 'required|numeric|min:1',
        ]);

        // Ici tu brancheras ta DB plus tard

        session()->flash('success', 'Affectation créée avec succès.');

        $this->reset([
            'professeur_id',
            'departement',
            'matiere',
            'type_cours',
            'volume_affecte',
            'volume_effectue'
        ]);

        $this->volume_effectue = 0;

        $this->dispatch('close-modal');
    }
};
?>

<div>

    {{-- BOUTON OUVRIR MODAL --}}
    <button class="group relative flex items-center gap-2 h-11 px-6 rounded-2xl
                   bg-linear-to-br from-primary to-primary-end
                   text-base-100 shadow-md hover:shadow-lg hover:-translate-y-0.5 
                   active:scale-95 transition-all duration-200 cursor-pointer"
        onclick="create_affectation.showModal()">

        <x-heroicon-o-plus class="h-5 w-5 group-hover:scale-110 transition-transform" />

        <span class="text-sm font-bold tracking-wide">
            Nouvelle affectation
        </span>

        <div class="absolute inset-0 rounded-2xl bg-base-100/10 opacity-0 group-hover:opacity-100 transition-opacity">
        </div>
    </button>

    {{-- MODAL --}}
    <dialog id="create_affectation" class="modal modal-bottom sm:modal-middle">

        <div class="modal-box p-0 overflow-hidden border-none shadow-2xl">

            {{-- HEADER --}}
            <x-shared.header-modal title="Créer une affectation"
                subtitle="Associer un enseignant à une matière et un type de cours." icon="heroicon-o-academic-cap"
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
                        </div>

                        {{-- DEPARTEMENT --}}
                        <x-shared.select-field label="Département" name="departement" icon="heroicon-o-building-office"
                            wire:model="departement">

                            <option value="">Choisir...</option>
                            <option value="Informatique">Informatique</option>
                            <option value="Mathématiques">Mathématiques</option>
                            <option value="Physique">Physique</option>
                            <option value="Chimie">Chimie</option>

                        </x-shared.select-field>

                        {{-- MATIERE --}}
                        <x-shared.input-field label="Matière" name="matiere" icon="heroicon-o-book-open"
                            placeholder="Ex: Algorithmique" wire:model="matiere" />

                        {{-- TYPE COURS --}}
                        <div class="md:col-span-2">
                            <x-shared.select-field label="Type de cours" name="type_cours" icon="heroicon-o-squares-2x2"
                                wire:model="type_cours">

                                <option value="">Choisir...</option>
                                <option value="CM">Cours Magistral (CM)</option>
                                <option value="TD">Travaux Dirigés (TD)</option>
                                <option value="TP">Travaux Pratiques (TP)</option>

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
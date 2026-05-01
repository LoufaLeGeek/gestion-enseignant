<?php

use Livewire\Component;

new class extends Component {
    public $departement;

    public $filieres = [];
    public $autresFilieres = [];

    public $selectedFiliere = null;

    public function mount($departement)
    {
        $this->departement = $departement;

        // Filières déjà liées
        $this->filieres = [
            ['id' => 1, 'nom' => 'L1 Informatique'],
            ['id' => 2, 'nom' => 'L2 Informatique'],
            ['id' => 3, 'nom' => 'L3 Informatique'],
        ];

        // Filières disponibles à assigner
        $this->autresFilieres = [
            ['id' => 4, 'nom' => 'L1 Mathématiques'],
            ['id' => 5, 'nom' => 'L2 Physique'],
        ];
    }
};
?>

<div>

    {{-- BOUTON VOIR --}}
    <button onclick="view_departement_{{ $departement['id'] }}.showModal()" class="flex items-center gap-1.5 px-3 py-1.5 rounded-lg
               bg-linear-to-br from-primary to-primary-end
               text-base-100 text-[11px] font-bold
               shadow-sm hover:brightness-110 active:scale-95
               transition-all duration-200">

        <x-heroicon-o-eye class="h-4 w-4" />
        Voir plus
    </button>

    {{-- MODAL / OVERLAY --}}
    <dialog id="view_departement_{{ $departement['id'] }}" class="modal modal-bottom sm:modal-middle">

        <div class="modal-box max-w-2xl p-0 overflow-auto border-none shadow-2xl">

            {{-- HEADER --}}
            <x-shared.header-modal title="Détails du département" subtitle="{{ $departement['nom'] }}"
                icon="heroicon-o-building-office-2" tint="bg-primary/10" border="border-primary/20"
                text="text-primary" />

            {{-- BODY --}}
            <div class="p-6 space-y-5">

                {{-- KPI --}}
                <livewire:shared.card-kpi label="Filières" :value="count($filieres)" subtext="Nombre total de filières"
                    icon="heroicon-o-academic-cap" iconBg="bg-primary/10" iconColor="text-primary"
                    textColor="text-primary" />

                {{-- LISTE FILIERES --}}
                <div class="space-y-2">

                    <p class="text-xs font-bold uppercase text-base-content/50">
                        Liste des filières
                    </p>

                    @foreach ($filieres as $f)
                        <div
                            class="flex items-center justify-between
                                    px-3 py-2 rounded-xl border border-base-200 bg-base-100">

                            <div>
                                <p class="text-[11px] font-bold">#{{ $f['id'] }}</p>
                                <p class="text-[12px]">{{ $f['nom'] }}</p>
                            </div>

                            {{-- DETACH --}}
                            <button class="text-[11px] text-error font-semibold hover:underline cursor-pointer">
                                Détacher
                            </button>

                        </div>
                    @endforeach

                </div>

                {{-- ASSIGNATION --}}
                <div class="pt-3 border-t border-base-200 space-y-3">

                    {{-- TITLE --}}
                    <p class="text-xs font-bold uppercase text-base-content/50">
                        Assigner une filière
                    </p>

                    {{-- ROW --}}
                    <div class="flex flex-col sm:flex-row sm:items-end gap-3">

                        {{-- SELECT --}}
                        <div class="flex-1 min-w-0">
                            <x-shared.select-field label="Choisir une filière" name="filiere"
                                icon="heroicon-o-academic-cap" wire:model="selectedFiliere">

                                <option value="">Sélectionner...</option>

                                @foreach ($autresFilieres as $f)
                                    <option value="{{ $f['id'] }}">
                                        {{ $f['nom'] }}
                                    </option>
                                @endforeach

                            </x-shared.select-field>
                        </div>

                        {{-- BUTTON --}}
                        <button class="group relative flex items-center justify-center gap-2
                   h-10 px-4 sm:px-5 rounded-xl
                   bg-linear-to-br from-primary to-primary-end
                   text-base-100 text-sm font-bold
                   shadow-sm hover:shadow-md hover:-translate-y-0.5
                   active:scale-95 transition-all duration-200
                   w-full sm:w-auto">

                            <x-heroicon-o-plus
                                class="h-4 w-4 group-hover:rotate-90 transition-transform duration-300" />

                            <span>Assigner</span>

                            <div
                                class="absolute inset-0 rounded-xl bg-base-100/10 opacity-0 group-hover:opacity-100 transition-opacity">
                            </div>

                        </button>

                    </div>

                </div>


            </div>

            {{-- BACKDROP --}}
            <form method="dialog" class="modal-backdrop">
                <button>close</button>
            </form>

    </dialog>

</div>
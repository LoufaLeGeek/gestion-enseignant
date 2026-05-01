<?php

use Livewire\Component;

new class extends Component {

    public $filiere;

    public $code = '';
    public $intitule = '';
    public $volumeCM = 0;
    public $volumeTD = 0;
    public $semestre = '';

    public function mount($filiere)
    {
        $this->filiere = $filiere;
    }

    public function save()
    {
        // Simulation (pas de logique réelle pour l’instant)
        // Tu pourras ajouter validation + DB plus tard
    }
};
?>

<div>

    {{-- BOUTON --}}
    <button onclick="create_matiere_{{ $filiere['id'] }}.showModal()" class="group flex items-center gap-2 px-4 h-10 rounded-xl
               bg-linear-to-br from-primary to-primary-end
               text-base-100 text-sm font-bold
               shadow-sm hover:shadow-md hover:-translate-y-0.5
               active:scale-95 transition-all duration-200">

        <x-heroicon-o-plus class="h-4 w-4 group-hover:rotate-90 transition" />
        Nouvelle matière
    </button>

    {{-- MODAL --}}
    <dialog id="create_matiere_{{ $filiere['id'] }}" class="modal modal-bottom sm:modal-middle">

        <div class="modal-box p-0 overflow-hidden border-none shadow-2xl">

            {{-- HEADER --}}
            <x-shared.header-modal title="Créer une matière" subtitle="{{ $filiere['nom'] }}"
                icon="heroicon-o-book-open" tint="bg-primary/10" border="border-primary/20" text="text-primary" />

            {{-- BODY --}}
            <div class="p-6">
                <form wire:submit.prevent="save" class="space-y-5">

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                        {{-- CODE --}}
                        <x-shared.input-field label="Code matière" name="code" icon="heroicon-o-hashtag"
                            placeholder="Ex: INF101" wire:model="code" />

                        {{-- INTITULE --}}
                        <x-shared.input-field label="Intitulé" name="intitule" icon="heroicon-o-book-open"
                            placeholder="Ex: Algorithmique" wire:model="intitule" />

                        {{-- VOLUME CM --}}
                        <x-shared.input-field label="Volume CM (heures)" name="volumeCM" type="number"
                            icon="heroicon-o-presentation-chart-bar" wire:model="volumeCM" />

                        {{-- VOLUME TD --}}
                        <x-shared.input-field label="Volume TD (heures)" name="volumeTD" type="number"
                            icon="heroicon-o-user-group" wire:model="volumeTD" />

                        {{-- SEMESTRE --}}
                        <div class="md:col-span-2">
                            <x-shared.select-field label="Semestre" name="semestre" icon="heroicon-o-calendar-days"
                                wire:model="semestre">

                                <option value="">Choisir...</option>
                                <option value="S1">S1</option>
                                <option value="S2">S2</option>
                                <option value="S3">S3</option>
                                <option value="S4">S4</option>
                                <option value="S5">S5</option>
                                <option value="S6">S6</option>

                            </x-shared.select-field>
                        </div>

                        {{-- ACTION --}}
                        <div class="md:col-span-2 pt-2">
                            <x-shared.btn-submit target="save" icon="heroicon-o-plus" class="w-full">

                                Créer la matière
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
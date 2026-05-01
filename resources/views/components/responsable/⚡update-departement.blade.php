<?php

use Livewire\Component;

new class extends Component {
    public $departement;

    public $nom;
    public $description;

    public function mount($departement)
    {
        $this->departement = $departement;

        $this->nom = $departement['nom'];
        $this->description = $departement['description'];
    }

    public function update()
    {

    }
};
?>

<div>

    {{-- BOUTON EDIT --}}
    <button onclick="update_departement_{{ $departement['id'] }}.showModal()" class="h-8 w-8 flex items-center justify-center rounded-lg
               hover:bg-base-200 transition">

        <x-heroicon-o-pencil-square class="h-4 w-4 text-primary" />

    </button>

    {{-- MODAL --}}
    <dialog id="update_departement_{{ $departement['id'] }}" class="modal modal-bottom sm:modal-middle">

        <div class="modal-box p-0 overflow-hidden border-none shadow-2xl">

            {{-- HEADER --}}
            <x-shared.header-modal title="Modifier le département"
                subtitle="Mettre à jour les informations du département." icon="heroicon-o-pencil-square"
                tint="bg-primary/10" border="border-primary/20" text="text-primary" />

            {{-- BODY --}}
            <div class="p-6">

                <form wire:submit.prevent="update" class="space-y-5">

                    {{-- NOM --}}
                    <x-shared.input-field label="Nom du département" name="nom" icon="heroicon-o-building-office"
                        wire:model="nom" />

                    {{-- DESCRIPTION --}}
                    <div>
                        <label class="text-sm font-medium mb-1 block">
                            Description
                        </label>

                        <textarea wire:model="description" rows="4" class="w-full rounded-xl text-sm p-3
                                   bg-base-200 border border-transparent
                                   focus:bg-base-100 focus:border-primary/30 focus:outline-none
                                   transition resize-none">
                        </textarea>
                    </div>

                    {{-- SUBMIT --}}
                    <x-shared.btn-submit target="update" icon="heroicon-o-check" class="w-full">

                        Mettre à jour

                    </x-shared.btn-submit>

                </form>

            </div>

        </div>

        <form method="dialog" class="modal-backdrop">
            <button>close</button>
        </form>

    </dialog>

</div>
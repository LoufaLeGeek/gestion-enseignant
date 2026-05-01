<?php

use Livewire\Component;

new class extends Component {
    public $nom;
    public $description;

    public function save()
    {

    }
};
?>

<div>

    {{-- BOUTON AJOUTER --}}
    <button class="group relative flex items-center gap-2 h-11 px-6 rounded-2xl
                   bg-linear-to-br from-primary to-primary-end
                   text-base-100 shadow-md hover:shadow-lg hover:-translate-y-0.5 
                   active:scale-95 transition-all duration-200 cursor-pointer"
        onclick="create_departement.showModal()">

        <x-heroicon-o-building-office-2 class="h-5 w-5 group-hover:scale-110 transition-transform" />

        <span class="text-sm font-bold tracking-wide">
            Nouveau département
        </span>

        <div class="absolute inset-0 rounded-2xl bg-base-100/10 opacity-0 group-hover:opacity-100 transition-opacity">
        </div>
    </button>

    {{-- MODAL --}}
    <dialog id="create_departement" class="modal modal-bottom sm:modal-middle">

        <div class="modal-box p-0 border-none shadow-2xl">

            {{-- HEADER --}}
            <x-shared.header-modal title="Créer un département" subtitle="Ajouter une nouvelle unité académique."
                icon="heroicon-o-building-office-2" tint="bg-primary/10" border="border-primary/20"
                text="text-primary" />

            {{-- BODY --}}
            <div class="p-6">

                <form wire:submit.prevent="save" class="space-y-5">

                    {{-- NOM --}}
                    <x-shared.input-field label="Nom du département" name="nom" icon="heroicon-o-building-office"
                        placeholder="Ex: Informatique" wire:model="nom" />

                    {{-- DESCRIPTION --}}
                    <div>
                        <label class="text-sm font-medium mb-1 block">
                            Description
                        </label>

                        <textarea wire:model="description" rows="4" placeholder="Décrire brièvement le département..."
                            class="w-full rounded-xl text-sm p-3
                                   bg-base-200 border border-transparent
                                   focus:bg-base-100 focus:border-primary/30 focus:outline-none
                                   transition resize-none">
                        </textarea>
                    </div>

                    {{-- SUBMIT --}}
                    <x-shared.btn-submit target="save" icon="heroicon-o-check-circle" class="w-full">

                        Créer le département

                    </x-shared.btn-submit>

                </form>

            </div>

        </div>

        {{-- BACKDROP --}}
        <form method="dialog" class="modal-backdrop">
            <button>close</button>
        </form>

    </dialog>

</div>
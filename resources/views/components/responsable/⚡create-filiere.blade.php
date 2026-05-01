<?php

use Livewire\Component;

new class extends Component {

    public $nom = '';
    public $niveau = '';
    public $description = '';

    public function save()
    {
        // Simulation (pas de logique backend pour l’instant)
    }
};
?>


<div>

    {{-- BOUTON AJOUT --}}
    <button onclick="create_filiere_modal.showModal()" class="group relative flex items-center gap-2 h-11 px-6 rounded-2xl
           bg-linear-to-br from-primary to-primary-end
           text-base-100 shadow-md hover:shadow-lg hover:-translate-y-0.5 
           active:scale-95 transition-all duration-200 cursor-pointer">

        {{-- ICON --}}
        <x-heroicon-o-academic-cap class="h-5 w-5 group-hover:scale-110 transition-transform duration-200" />

        {{-- LABEL --}}
        <span class="text-sm font-bold tracking-wide">
            Ajouter une filière
        </span>

        {{-- HOVER OVERLAY --}}
        <div class="absolute inset-0 rounded-2xl bg-base-100/10 
                opacity-0 group-hover:opacity-100 transition-opacity">
        </div>

    </button>

    {{-- MODAL --}}
    <dialog id="create_filiere_modal" class="modal modal-bottom sm:modal-middle">

        <div class="modal-box p-0 overflow-hidden border-none shadow-2xl">

            {{-- HEADER --}}
            <x-shared.header-modal title="Créer une nouvelle filière" subtitle="Ajouter un parcours académique"
                icon="heroicon-o-academic-cap" tint="bg-primary/10" border="border-primary/20" text="text-primary" />

            {{-- BODY --}}
            <div class="p-6">
                <form wire:submit.prevent="save" class="space-y-5">

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                        {{-- NOM --}}
                        <x-shared.input-field label="Nom de la filière" name="nom" icon="heroicon-o-academic-cap"
                            placeholder="Ex: Génie Logiciel" wire:model="nom" />

                        {{-- NIVEAU --}}
                        <x-shared.select-field label="Niveau" name="niveau" icon="heroicon-o-sparkles"
                            wire:model="niveau">

                            <option value="">Choisir...</option>
                            <option value="Licence">Licence</option>
                            <option value="Master">Master</option>
                            <option value="Doctorat">Doctorat</option>

                        </x-shared.select-field>

                        {{-- DESCRIPTION (AMÉLIORÉ) --}}
                        <div class="md:col-span-2">

                            <label class="text-[11px] font-semibold text-base-content/70 mb-1 block">
                                Description
                            </label>

                            <div class="group relative">

                                <x-heroicon-o-document-text class="h-4 w-4 absolute left-3 top-3 text-base-content/40 
                                           group-focus-within:text-primary transition-colors" />

                                <textarea wire:model="description" rows="4" placeholder="Décrire la filière..." class="w-full pl-9 pr-3 py-2.5 text-[12px] rounded-xl
                                           bg-base-200 border border-transparent
                                           resize-none
                                           focus:bg-base-100 focus:border-primary/30 focus:outline-none
                                           transition-all duration-200"></textarea>

                            </div>

                        </div>

                        {{-- ACTION --}}
                        <div class="md:col-span-2 pt-2">
                            <x-shared.btn-submit target="save" icon="heroicon-o-plus" class="w-full">

                                Créer la filière
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
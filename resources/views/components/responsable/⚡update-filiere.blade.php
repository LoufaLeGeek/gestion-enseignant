<?php

use Livewire\Component;

new class extends Component {

    public $filiere;

    public $nom;
    public $niveau;
    public $description;

    public function mount($filiere)
    {
        $this->filiere = $filiere;

        // Pré-remplissage
        $this->nom = $filiere['nom'];
        $this->niveau = $filiere['niveau'];
        $this->description = $filiere['description'];
    }

    public function update()
    {
        // Simulation (pas de logique pour l’instant)
    }
};
?>


<div>

    {{-- BOUTON UPDATE --}}
    <button onclick="update_filiere_{{ $filiere['id'] }}.showModal()" class="h-8 w-8 flex items-center justify-center rounded-lg
               hover:bg-base-200 transition">

        <x-heroicon-o-pencil-square class="h-4 w-4 text-primary" />
    </button>

    {{-- MODAL --}}
    <dialog id="update_filiere_{{ $filiere['id'] }}" class="modal modal-bottom sm:modal-middle">

        <div class="modal-box p-0 overflow-hidden border-none shadow-2xl">

            {{-- HEADER --}}
            <x-shared.header-modal title="Modifier la filière" subtitle="{{ $filiere['nom'] }}"
                icon="heroicon-o-pencil-square" tint="bg-primary/10" border="border-primary/20" text="text-primary" />

            {{-- BODY --}}
            <div class="p-6">
                <form wire:submit.prevent="update" class="space-y-5">

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

                        {{-- DESCRIPTION --}}
                        <div class="md:col-span-2">

                            {{-- LABEL --}}
                            <label class="text-[11px] font-semibold text-base-content/70 mb-1 block">
                                Description
                            </label>

                            {{-- WRAPPER --}}
                            <div class="group relative">

                                {{-- ICON --}}
                                <x-heroicon-o-document-text class="h-4 w-4 absolute left-3 top-3 text-base-content/40 
                   group-focus-within:text-primary transition-colors" />

                                {{-- TEXTAREA --}}
                                <textarea wire:model="description" rows="4" placeholder="Décrire la filière..." class="w-full pl-9 pr-3 py-2.5 text-[12px] rounded-xl
                   bg-base-200 border border-transparent
                   resize-none
                   focus:bg-base-100 focus:border-primary/30 focus:outline-none
                   transition-all duration-200"></textarea>

                            </div>

                        </div>
                        {{-- ACTION --}}
                        <div class="md:col-span-2 pt-2">
                            <x-shared.btn-submit target="update" icon="heroicon-o-pencil-square" class="w-full">

                                Mettre à jour
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
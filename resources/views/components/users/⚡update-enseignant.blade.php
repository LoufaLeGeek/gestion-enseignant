<?php

use Livewire\Component;

new class extends Component {
    public $enseignant;

    public $specialite;
    public $plafond_horaire;
    public $telephone;

    public function mount($enseignant)
    {
        $this->enseignant = $enseignant;
        $this->specialite = $enseignant->specialite;
        $this->plafond_horaire = $enseignant->plafond_horaire;
        $this->telephone = $enseignant->telephone;
    }

    public function update()
    {
        // Logique de mise à jour fictive
        $this->dispatch('notify', message: 'Profil mis à jour avec succès !');
    }
}; ?>

<div>
    {{-- Bouton Modifier (Déclenché par ID unique pour éviter les conflits) --}}
    <button class="h-8 px-4 rounded-lg bg-base-200 border border-base-300 
                    text-[10px] font-black uppercase tracking-widest 
                   hover:bg-primary hover:text-white hover:border-primary 
                   transition-all active:scale-95 cursor-pointer"
        onclick="update_enseignant_{{ $enseignant->id }}.showModal()">
        Modifier
    </button>

    {{-- Modal de Mise à jour --}}
    <dialog id="update_enseignant_{{ $enseignant->id }}" class="modal modal-bottom sm:modal-middle">
        <div class="modal-box p-0 overflow-hidden border-none shadow-2xl">

            {{-- En-tête de la Modal (Utilisation de tes composants partagés) --}}
            <x-shared.header-modal title="Modifier le profil"
                subtitle="Mise à jour des informations de {{ $enseignant->prenom }} {{ $enseignant->nom }}"
                icon="heroicon-o-pencil-square" tint="bg-tint-primary" border="border-border-primary-light"
                text="text-primary" />

            <div class="p-6 text-left">
                <form wire:submit.prevent="update" class="w-full">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                        {{-- 1. Spécialité --}}
                        <div class="md:col-span-2">
                            <x-shared.input-field label="Domaine d'Expertise" name="specialite"
                                icon="heroicon-o-academic-cap" placeholder="Ex: Algorithmique, Design..."
                                wire:model="specialite" />
                        </div>

                        {{-- 2. Plafond Horaire --}}
                        <x-shared.input-field label="Quota Annuel (Heures)" name="plafond_horaire" type="number"
                            icon="heroicon-o-clock" placeholder="Ex: 160" wire:model="plafond_horaire" />

                        {{-- 3. Téléphone --}}
                        <x-shared.input-field label="Contact Téléphonique" name="telephone" type="tel"
                            icon="heroicon-o-phone" placeholder="+221 -- --- -- --" wire:model="telephone" />

                        {{-- 4. Actions --}}
                        <div class="md:col-span-2 pt-2">
                            <x-shared.btn-submit target="update" icon="heroicon-o-check" class="w-full">
                                Enregistrer les modifications
                            </x-shared.btn-submit>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        {{-- Overlay pour fermer --}}
        <form method="dialog" class="modal-backdrop">
            <button>Fermer</button>
        </form>
    </dialog>
</div>
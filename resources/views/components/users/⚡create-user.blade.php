<?php

use Livewire\Component;

new class extends Component {

};
?>

<div>
    {{-- Bouton Ajouter --}}
    <button class="group relative flex items-center gap-2 h-11 px-6 rounded-2xl
                   bg-linear-to-br from-role-admin to-role-admin-end
                   text-base-100 shadow-md hover:shadow-lg hover:-translate-y-0.5 
                   active:scale-95 transition-all duration-200 cursor-pointer" onclick="create_user.showModal()">

        <x-heroicon-o-user-plus class="h-5 w-5 group-hover:scale-110 transition-transform" />

        <span class="text-sm font-bold tracking-wide">
            Ajouter un utilisateur
        </span>
        <div class="absolute inset-0 rounded-2xl bg-base-100/10 opacity-0 group-hover:opacity-100 transition-opacity">
        </div>
    </button>


    <dialog id="create_user" class="modal modal-bottom sm:modal-middle">
        <div class="modal-box p-0 overflow-auto border-none shadow-2xl">
            {{-- En-tête de la Modal --}}
            <x-shared.header-modal title="Créer un nouvel utilisateur"
                subtitle="Remplissez les informations pour ajouter un membre du personnel." icon="heroicon-o-user-plus"
                tint="bg-role-admin-tint" border="border-role-admin-border" text="text-role-admin-text" />

            {{-- Corps de la Modal --}}
            <div class="p-6">
                <form wire:submit.prevent="save" class="w-full">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                        {{-- 1. Prénom --}}
                        <x-shared.input-field label="Prénom" name="first_name" icon="heroicon-o-identification"
                            placeholder="Ex: Jean" wire:model="first_name" />

                        {{-- 2. Nom --}}
                        <x-shared.input-field label="Nom" name="last_name" icon="heroicon-o-user"
                            placeholder="Ex: Dupont" wire:model="last_name" />

                        {{-- 3. Adresse Email --}}
                        <div class="md:col-span-2">
                            <x-shared.input-field label="Adresse Email" name="email" type="email"
                                icon="heroicon-o-envelope" placeholder="jean.dupont@ecole.sn" wire:model="email" />
                        </div>

                        {{-- 4. Téléphone --}}
                        <div class="md:col-span-2">
                            <x-shared.input-field label="Numéro de Téléphone" name="phone" type="tel"
                                icon="heroicon-o-phone" placeholder="+221 -- --- -- --" wire:model="phone" />
                        </div>

                        {{-- 5. Rôle --}}
                        <div class="md:col-span-2">
                            <x-shared.select-field label="Rôle Utilisateur" name="role" icon="heroicon-o-shield-check"
                                wire:model="role">
                                <option value="" selected disabled>Choisir un rôle...</option>
                                <option value="admin">Administrateur</option>
                                <option value="teacher">Enseignant</option>
                                <option value="manager">Responsable</option>
                                <option value="accountant">Comptable</option>
                            </x-shared.select-field>
                        </div>

                        {{-- 6. Actions --}}
                        <div class="md:col-span-2 pt-2">
                            <x-shared.btn-submit target="save" icon="heroicon-o-user-plus" class="w-full">
                                Créer l'utilisateur
                            </x-shared.btn-submit>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        {{-- Overlay pour fermer en cliquant à côté --}}
        <form method="dialog" class="modal-backdrop">
            <button>close</button>
        </form>
    </dialog>
</div>
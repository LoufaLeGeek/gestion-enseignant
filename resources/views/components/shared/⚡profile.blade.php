<?php

use Livewire\Component;

new class extends Component {
    // Données brutes pour l'affichage
    public $prenom = "Jean";
    public $nom = "Dupont";
    public $email = "j.dupont@ufr-ses.sn";
    public $initial = "JD";
}; ?>

<div class="w-full">


    <div onclick="profile_modal.showModal()" class="group w-full h-fit flex items-center cursor-pointer border border-border-subtle py-2 rounded-lg bg-base-300 hover:bg-gray-200
            is-drawer-close:justify-center is-drawer-open:px-2
">
        <div
            class="h-8 w-8 flex items-center justify-center rounded-full bg-linear-to-br from-primary to-primary-end text-base-100 shadow shadow-shadow-primary">
            <span class="text-base-100 tracking-wide font-semibold">{{ $initial }}</span>
        </div>
        <div class="is-drawer-close:hidden flex flex-col overflow-hidden ml-3">
            <span class="text-sm font-semibold whitespace-nowrap tracking-wide">{{ $prenom }} {{ $nom }}</span>
            <span class="text-[11px] whitespace-nowrap text-text-muted">{{ $email }}</span>
        </div>
    </div>

    {{-- 2. L'OVERLAY (Inspiré de ta Modal Ajouter Utilisateur) --}}
    <dialog id="profile_modal" class="modal modal-bottom sm:modal-middle">
        <div class="modal-box p-0 overflow-hidden border-none shadow-2xl bg-base-100">

            {{-- En-tête de la Modal (Utilisation de ton composant shared) --}}
            <x-shared.header-modal title="Mon Profil" subtitle="Modifier vos informations personnelles et votre accès."
                icon="heroicon-o-user-circle" tint="bg-tint-primary" border="border-border-primary-light"
                text="text-primary" />

            {{-- Corps de la Modal --}}
            <div class="p-6">
                <form class="w-full space-y-5">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                        {{-- Prénom --}}
                        <x-shared.input-field label="Prénom" name="first_name" icon="heroicon-o-identification"
                            placeholder="Ex: Jean" value="{{ $prenom }}" />

                        {{-- Nom --}}
                        <x-shared.input-field label="Nom" name="last_name" icon="heroicon-o-user"
                            placeholder="Ex: Dupont" value="{{ $nom }}" />

                        {{-- Mot de passe --}}
                        <div class="md:col-span-2">
                            <x-shared.input-field label="Nouveau mot de passe" name="password" type="password"
                                icon="heroicon-o-lock-closed" placeholder="••••••••••••" />
                        </div>

                        {{-- Confirmation --}}
                        <div class="md:col-span-2">
                            <x-shared.input-field label="Confirmer le mot de passe" name="password_confirmation"
                                type="password" icon="heroicon-o-shield-check" placeholder="••••••••••••" />
                        </div>

                        {{-- Actions --}}
                        <div class="md:col-span-2 pt-2 flex flex-col gap-3">
                            <x-shared.btn-submit target="save" icon="heroicon-o-check-circle" class="w-full">
                                Enregistrer les modifications
                            </x-shared.btn-submit>

                            <button type="button" onclick="profile_modal.close()"
                                class="w-full h-11 text-[11px] font-black uppercase tracking-widest text-text-muted hover:bg-base-200 rounded-xl transition-all">
                                Annuler
                            </button>
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
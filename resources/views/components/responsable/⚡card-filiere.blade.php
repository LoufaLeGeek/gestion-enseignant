<?php

use Livewire\Component;

new class extends Component {
    public $filiere;

    public function mount($filiere)
    {
        $this->filiere = $filiere;
    }
};
?>

<div class="group bg-base-100 rounded-2xl border-2 border-base-300 overflow-hidden
            hover:-translate-y-1 hover:shadow-md transition-all duration-300">

    {{-- HEADER --}}
    <div class="p-4 pb-3">

        <div class="flex items-start justify-between mb-4">

            {{-- ICON + INFOS --}}
            <div class="flex items-center gap-3">

                <div class="h-12 w-12 rounded-xl flex items-center justify-center
                            bg-linear-to-br from-primary to-primary-end
                            text-base-100 shadow-sm
                            group-hover:rotate-3 group-hover:scale-110 transition">

                    <x-heroicon-o-academic-cap class="h-5 w-5" />

                </div>

                <div class="min-w-0">

                    <h3 class="text-[14px] font-bold leading-tight truncate">
                        {{ $filiere['nom'] }}
                    </h3>

                    <p class="text-[10px] text-base-content/50 mt-1">
                        Niveau : {{ $filiere['niveau'] }}
                    </p>

                </div>

            </div>

            {{-- ACTIONS --}}
            <div class="flex gap-1">

                {{-- UPDATE --}}
                <livewire:responsable.update-filiere :filiere="$filiere" :key="'update-filiere-' . $filiere['id']" />

                {{-- DELETE --}}
                <button class="h-8 w-8 flex items-center justify-center rounded-lg
                               hover:bg-base-200 transition" title="Supprimer">

                    <x-heroicon-o-trash class="h-4 w-4 text-error" />

                </button>

            </div>

        </div>

        {{-- DESCRIPTION --}}
        <div class="px-3 py-2.5 rounded-xl bg-base-200 border border-base-300">

            <p class="text-[10px] text-base-content/50 uppercase font-bold mb-1">
                Description
            </p>

            <p class="text-[12px] font-medium line-clamp-3">
                {{ $filiere['description'] ?? 'Aucune description disponible.' }}
            </p>

        </div>

    </div>

    {{-- SEPARATOR --}}
    <div class="h-px bg-base-300/50 mx-4"></div>

    {{-- FOOTER --}}
    <div class="px-4 py-3 flex items-center justify-between bg-base-300/10">

        <span class="text-[10px] font-bold uppercase tracking-widest text-base-content/40">
            Filière académique
        </span>

        {{-- VIEW BUTTON --}}
        <livewire:responsable.view-filiere :filiere="$filiere" :key="'view-filiere-' . $filiere['id']" />

    </div>

</div>
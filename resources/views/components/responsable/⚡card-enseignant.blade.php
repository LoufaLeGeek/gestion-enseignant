<?php

use Livewire\Component;

new class extends Component {
    public $enseignant;

    public function getStyleProperty()
    {
        return [
            'from' => 'from-primary',
            'to' => 'to-primary-end',
            'tint' => 'bg-tint-primary',
            'text' => 'text-primary',
            'icon' => 'heroicon-o-academic-cap',
            'shadow' => 'shadow-shadow-primary'
        ];
    }
}; ?>

<div
    class="bg-base-100 rounded-2xl border-2 border-base-300 overflow-hidden hover:-translate-y-1 hover:shadow-md transition-all duration-300 group">

    <div class="p-4 pb-3">
        {{-- Header : Avatar, Identité & Action "+" --}}
        <div class="flex items-start justify-between mb-4">
            <div class="flex items-center gap-3">
                <div
                    class="h-12 w-12 shrink-0 rounded-xl flex items-center justify-center font-black text-base-100 bg-linear-to-br {{ $this->style['from'] }} {{ $this->style['to'] }} {{ $this->style['shadow'] }} shadow-sm group-hover:rotate-3 group-hover:scale-110 transition-transform duration-300">
                    {{ $enseignant->initials }}
                </div>
                <div>
                    <h3 class="text-[14px] font-bold leading-tight">{{ $enseignant->prenom }} {{ $enseignant->nom }}
                    </h3>
                    <div class="flex items-center gap-2 mt-1">
                        {{-- Badge Grade --}}
                        <span
                            class="px-1.5 py-0.5 rounded-md bg-base-200 border border-base-300 text-[9px] font-black uppercase text-text-muted">
                            {{ $enseignant->grade ?? 'SANS GRADE' }}
                        </span>
                    </div>
                </div>
            </div>

            {{-- Bouton Assigner (+) mis en évidence --}}
            <button onclick="assign_modal_{{ $enseignant->id }}.showModal()"
                class="h-9 w-9 rounded-lg flex items-center justify-center bg-linear-to-br {{ $this->style['from'] }} {{ $this->style['to'] }} text-base-100  {{ $this->style['shadow'] }} hover:brightness-110 active:scale-90 transition-all">
                <x-heroicon-o-plus class="h-5 w-5 stroke-3" />
            </button>
        </div>

        {{-- Section Info : Spécialité --}}
        <div class="px-3 py-2.5 rounded-xl bg-base-200 border border-base-300 mb-4 flex items-center gap-3">
            <div class="h-8 w-8 rounded-lg flex items-center justify-center {{ $this->style['tint'] }}">
                <x-dynamic-component :component="$this->style['icon']" class="h-4 w-4 {{ $this->style['text'] }}" />
            </div>
            <div class="flex-1 min-w-0">
                <p class="text-[9px] text-text-muted uppercase font-black leading-none mb-1">Spécialité</p>
                <p class="text-[12px] font-bold truncate">
                    {{ $enseignant->specialite ?? 'Non renseignée' }}
                </p>
            </div>
        </div>

        {{-- Section Contact --}}
        <div class="space-y-2 px-1">
            <div class="flex items-center gap-2 text-text-muted">
                <x-heroicon-o-envelope class="h-3.5 w-3.5" />
                <span class="text-[11px] font-medium truncate">{{ $enseignant->email }}</span>
            </div>
            <div class="flex items-center gap-2 text-text-muted">
                <x-heroicon-o-phone class="h-3.5 w-3.5" />
                <span class="text-[11px] font-medium">{{ $enseignant->telephone }}</span>
            </div>
        </div>
    </div>

    <div class="h-px bg-base-300/50 mx-4"></div>

    {{-- Footer : Bouton Détails --}}
    <div class="px-4 py-3 flex items-center justify-between bg-base-300/10">
        <span class="text-[10px] font-black uppercase tracking-widest text-text-muted/50">Détails Enseignant</span>

        <button
            class="flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-base-100 border border-base-300 text-[11px] font-bold hover:text-primary hover:border-primary/50 transition-colors ">
            <x-heroicon-o-eye class="h-4 w-4" />
            Voir
        </button>
    </div>
</div>
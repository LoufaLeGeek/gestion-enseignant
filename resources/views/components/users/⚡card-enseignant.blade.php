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
        ];
    }
}; ?>

<div
    class="bg-base-100 rounded-2xl border-2 border-base-300 overflow-hidden hover:-translate-y-1 hover:shadow-md transition-all duration-300 group">

    <div class="p-4 pb-3">
        {{-- Header : Avatar & Statut --}}
        <div class="flex items-center justify-between mb-4">
            <div class="flex items-center gap-3">
                <div
                    class="h-11 w-11 shrink-0 rounded-xl flex items-center justify-center font-black text-base-100 bg-linear-to-br {{ $this->style['from'] }} {{ $this->style['to'] }} shadow-sm group-hover:rotate-3 group-hover:scale-110 transition-transform duration-300">
                    {{ $enseignant->initials }}
                </div>
                <div>
                    <h3 class="text-[14px] font-bold leading-tight">{{ $enseignant->prenom }} {{ $enseignant->nom }}
                    </h3>
                    <p class="text-[10px] text-text-muted font-mono mt-0.5">{{ $enseignant->matricule }}</p>
                </div>
            </div>
            {{-- Point d'activité --}}
            <div
                class="h-2.5 w-2.5 rounded-full border-2 border-base-100 {{ $enseignant->actif ? 'bg-success' : 'bg-error' }} ring-1 ring-base-200">
            </div>
        </div>

        {{-- Section Info : Spécialité --}}
        <div class="px-3 py-2.5 rounded-xl bg-base-200 border border-base-300 mb-4 flex items-center gap-3">
            <div class="h-8 w-8 rounded-lg flex items-center justify-center {{ $this->style['tint'] }}">
                <x-dynamic-component :component="$this->style['icon']" class="h-4 w-4 {{ $this->style['text'] }}" />
            </div>
            <div class="flex-1 min-w-0">
                <p class="text-[9px] text-text-muted uppercase font-black leading-none mb-1">Domaine d'expertise</p>
                <p class="text-[12px] font-bold truncate">
                    {{ $enseignant->specialite ?? 'Non renseignée' }}
                </p>
            </div>
        </div>

        {{-- Section Info : Plafond Horaire --}}
        <div class="flex items-center justify-between px-1">
            <div class="flex items-center gap-2 text-text-muted">
                <x-heroicon-o-presentation-chart-line class="h-4 w-4" />
                <span class="text-[11px] font-bold uppercase tracking-tighter">Quota Annuel</span>
            </div>
            <div class="text-right">
                <span class="text-[14px] font-black text-primary">{{ $enseignant->plafond_horaire ?? 0 }}h</span>
            </div>
        </div>
    </div>

    <div class="h-px bg-base-300/50 mx-4"></div>

    {{-- Footer--}}
    <div class="px-4 py-3 flex items-center justify-between bg-base-100/50">
        <div class="flex items-center gap-1.5 text-text-muted">
            <x-heroicon-o-phone class="h-3.5 w-3.5" />
            <span class="text-[11px] font-medium tracking-tight italic">{{ $enseignant->telephone }}</span>
        </div>

        {{-- Appel du composant de modification --}}
        <livewire:users.update-enseignant :enseignant="$enseignant" :key="'update-' . $enseignant->id" />
    </div>
</div>
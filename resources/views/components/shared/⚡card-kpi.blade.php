<?php

use Livewire\Component;

new class extends Component {
    public string $label = '';
    public string $value = '';
    public string $subtext = '';
    public string $icon = '';

    // Classes de style pour les couleurs
    public string $iconBg = '';
    public string $iconColor = '';
    public string $textColor = '';

    // Pour la barre de progression (optionnel)
    public ?int $progress = null;

    // Pour le badge (optionnel)
    public ?string $badgeLabel = null;
    public string $badgeBg = '';
    public string $badgeDot = '';

    public function mount(
        $label,
        $value,
        $subtext,
        $icon,
        $iconBg,
        $iconColor,
        $textColor,
        $progress = null,
        $badgeLabel = null,
        $badgeBg = '',
        $badgeDot = ''
    ) {
        $this->label = $label;
        $this->value = $value;
        $this->subtext = $subtext;
        $this->icon = $icon;
        $this->iconBg = $iconBg;
        $this->iconColor = $iconColor;
        $this->textColor = $textColor;
        $this->progress = $progress;
        $this->badgeLabel = $badgeLabel;
        $this->badgeBg = $badgeBg;
        $this->badgeDot = $badgeDot;
    }
}; ?>

<div
    class="bg-base-100 rounded-2xl border-2 border-base-300 p-4 flex flex-col gap-3 hover:-translate-y-1 hover:shadow-sm transition-all duration-200 group">
    <div class="flex items-center justify-between">
        <span class="text-[12px] font-medium text-text-muted">{{ $label }}</span>
        <div class="h-9 w-9 rounded-xl {{ $iconBg }} flex items-center justify-center">
            <x-dynamic-component :component="$icon" class="h-4.5 w-4.5 {{ $iconColor }}" />
        </div>
    </div>

    <div>
        <p class="text-[28px] font-bold {{ $textColor }} leading-none">{{ $value }}</p>
        <p class="text-[11px] text-text-muted mt-1.5">{{ $subtext }}</p>
    </div>

    {{-- Affichage de la barre de progression si définie --}}
    @if($progress !== null)
        <div class="h-1 rounded-full {{ $iconBg }} overflow-hidden">
            <div class="h-full rounded-full bg-linear-to-r from-primary to-primary-end" style="width: {{ $progress }}%">
            </div>
        </div>
    @endif

    {{-- Affichage du badge si défini --}}
    @if($badgeLabel)
        <div
            class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full w-fit {{ $badgeBg }} border border-current/10">
            <div class="h-1.5 w-1.5 rounded-full {{ $badgeDot }}"></div>
            <span class="text-[10px] font-semibold {{ $iconColor }}">{{ $badgeLabel }}</span>
        </div>
    @endif
</div>
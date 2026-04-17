@props([
    'title' => 'Titre de la modal',
    'subtitle' => null,
    'icon' => 'heroicon-o-information-circle',
    'tint' => 'bg-role-admin-tint',
    'border' => 'border-role-admin-border',
    'text' => 'text-role-admin-text'
])
<div class="bg-base-200/50 px-6 py-4 border-b border-base-300 flex items-center justify-between">
    <div class="flex items-center gap-3">
        {{-- Badge d'icône dynamique --}}
        <div class="h-10 w-10 rounded-xl flex items-center justify-center border {{ $tint }} {{ $border }}">
        <x-dynamic-component :component="$icon" class="h-5 w-5 {{ $text }}" />
        </div>      <div>
            <h3 class="text-sm font-bold  tracking-wider">
                {{ $title }}
            </h3>
            @if($subtitle)
                <p class="text-[11px] text-text-muted font-medium">
                    {{ $subtitle }}
                </p>
            @endif
        </div>
    </div>

    {{-- Bouton Fermer générique pour DaisyUI --}}
    <form method="dialog">
        <button class="toggle-btn">✕</button>
    </form>
</div>
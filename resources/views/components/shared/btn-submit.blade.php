@props([
    'target' => null, // La fonction Livewire à surveiller (ex: 'save')
    'icon' => 'heroicon-o-check-circle'
])

<button 
    {{ $attributes->merge([
        'type' => 'submit', 
        'class' => 'group relative flex items-center justify-center gap-2 h-11 px-8 rounded-2xl
                   bg-gradient-to-br from-role-admin to-role-admin-end
                   text-base-100 shadow-md hover:shadow-lg hover:-translate-y-0.5 cursor-pointer 
                   active:scale-95 transition-all duration-200 disabled:opacity-70 disabled:cursor-not-allowed'
    ]) }}
    wire:loading.attr="disabled"
>
    {{-- Icône et Texte (Cachés pendant le chargement si on veut, ou on garde l'icône) --}}
    <div wire:loading.remove wire:target="{{ $target }}" class="flex items-center gap-2">
        <x-dynamic-component :component="$icon" class="h-5 w-5 group-hover:scale-110 transition-transform" />
        <span class="text-sm font-bold tracking-wide">
            {{ $slot }}
        </span>
    </div>

    {{-- Spinner de chargement (Affiché uniquement pendant wire:loading) --}}
    <div wire:loading wire:target="{{ $target }}">
        <div class="flex items-center gap-2">
            <svg class="animate-spin h-5 w-5 text-base-100
            " fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
            <span class="text-sm font-bold tracking-wide">Traitement...</span>
        </div>
    </div>

    {{-- Reflet brillant au survol --}}
    <div class="absolute inset-0 rounded-2xl bg-base-100/10 opacity-0 group-hover:opacity-100 transition-opacity"></div>
</button>
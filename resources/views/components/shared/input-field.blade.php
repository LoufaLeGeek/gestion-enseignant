@props([
    'label' => null,
    'name' => null,
    'icon' => null,
    'type' => 'text',
    'placeholder' => ''
])

<div class="flex flex-col gap-1.5 w-full">
    {{-- 1. Label --}}
    @if($label)
        <label for="{{ $name }}" class="text-xs font-semibold  tracking-wider ml-1">
            {{ $label }}
        </label>
    @endif

    {{-- 2. Conteneur de l'input --}}
    <label @class([
        'group flex items-center gap-2.5 h-10 px-3 rounded-xl transition-all duration-200 border-2',
        'bg-base-200 border-transparent focus-within:bg-base-100 focus-within:border-base-300' => !$errors->has($name),
        'bg-red-50 border-red-200 focus-within:bg-base-100 focus-within:border-red-400' => $errors->has($name),
    ])>
        
        {{-- Icône --}}
        @if($icon)
            <x-dynamic-component :component="$icon" @class([
                'h-4 w-4 transition-all duration-300',
                'text-text-muted group-focus-within:text-primary group-focus-within:scale-110' => !$errors->has($name),
                'text-red-500' => $errors->has($name),
            ]) />
        @endif
        
        {{-- Input --}}
        <input 
            id="{{ $name }}"
            type="{{ $type }}" 
            placeholder="{{ $placeholder }}"
            {{ $attributes->merge(['class' => 'bg-transparent outline-none border-none focus:ring-0 w-full p-0 text-[13px] placeholder:text-text-muted']) }}
        />

        {{-- Indicateur d'erreur visuel (Optionnel) --}}
        @error($name)
            <x-heroicon-s-exclamation-circle class="h-4 w-4 text-red-500 animate-pulse" />
        @enderror
    </label>

    {{-- 3. Message d'erreur --}}
    @error($name)
        <p class="text-[11px] font-medium text-red-500 ml-1">
            {{ $message }}
        </p>
    @enderror
</div>
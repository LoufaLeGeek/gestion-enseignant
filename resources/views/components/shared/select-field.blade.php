@props([
    'label' => null,
    'name' => null,
    'icon' => null,
])

<div class="flex flex-col gap-1.5 w-full">
    {{-- Label --}}
    @if($label)
        <label for="{{ $name }}" class="text-xs font-semibold tracking-wider ml-1">
            {{ $label }}
        </label>
    @endif

    {{-- Conteneur stylisé --}}
    <div @class([
        'flex items-center gap-2 px-3 rounded-xl transition-all duration-200 border-2 h-10 group',
        'bg-base-200 border-transparent focus-within:bg-base-100 focus-within:border-base-300' => !$errors->has($name),
        'bg-red-50 border-red-200 focus-within:border-red-400' => $errors->has($name),
    ])>
        
        {{-- Icône --}}
        @if($icon)
            <x-dynamic-component :component="$icon" @class([
                'h-4 w-4 transition-all duration-300',
                'text-text-muted group-focus-within:text-primary' => !$errors->has($name),
                'text-red-500' => $errors->has($name),
            ]) />
        @endif
        
        {{-- Select DaisyUI --}}
        <select 
            id="{{ $name }}"
            {{ $attributes->merge([
                'class' => 'select select-ghost text-text-gray outline-none w-full h-full min-h-0 p-0 focus:bg-transparent border-none text-[13px] font-medium cursor-pointer'
            ]) }}
        >
            {{ $slot }}
        </select>
    </div>

    {{-- Message d'erreur --}}
    @error($name)
        <p class="text-[11px] font-medium text-red-500 ml-1 leading-none mt-0.5">
            {{ $message }}
        </p>
    @enderror
</div>
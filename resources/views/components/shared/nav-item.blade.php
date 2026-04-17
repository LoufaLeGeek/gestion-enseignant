{{-- Nav Item --}}
@props([
    'route' => '#',
    'label' => '',
    'icon' => ''
])

@php
    $isActive = request()->routeIs($route);
@endphp
<a href="{{ route($route) }}" wire:navigate @class([
    'group w-full h-fit flex items-center py-2 transition-all duration-200 ease-in rounded-lg cursor-pointer border is-drawer-close:border-none relative',
    'is-drawer-close:justify-center is-drawer-open:px-2',
    'border-transparent hover:border-border-primary-light hover:text-primary is-drawer-open:hover:bg-tint-primary' => !$isActive,
    'border-border-primary-light text-primary is-drawer-open:bg-tint-primary is-drawer-close:scale-125'  => $isActive,
])>

    {{-- vertical bar --}}
    <div 
        @class(['absolute top-[50%] right-1 w-1 h-7.5 rounded-full -translate-y-[50%] bg-linear-to-b from-primary to-primary-end', 'in-is-drawer-close:w-0.75 is-drawer-close:h-2/4', 'hidden' => !$isActive])
    ></div>


    <div @class([
        'h-8 w-8 flex items-center justify-center rounded-lg transition-all duration-200',
        'bg-base-300 group-hover:bg-linear-to-br group-hover:from-primary group-hover:to-primary-end group-hover:text-base-100 group-hover:shadow-lg group-hover:shadow-shadow-primary' => !$isActive,
        'bg-linear-to-br from-primary to-primary-end text-base-100 shadow-lg shadow-shadow-primary' => $isActive,
    ])>
        <x-dynamic-component :component="$icon" class="h-5 w-5" />
    </div>
    <span @class([
        'is-drawer-close:hidden ml-3 block text-[14px] font-medium transition-colors duration-200 tracking-wide',
        'group-hover:text-primary' => !$isActive,
        'text-primary' => $isActive,
    ])>
        {{ $label }}
    </span>
</a>
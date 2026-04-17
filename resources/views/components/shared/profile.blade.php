{{-- Profile --}}
@props([
    'initial' => '',
    'name' => '',
    'email' => ''
])



<div class="group w-full h-fit flex items-center cursor-pointer border border-border-subtle py-2 rounded-lg bg-base-300 hover:bg-gray-200
            is-drawer-close:justify-center is-drawer-open:px-2
">
    <div class="h-8 w-8 flex items-center justify-center rounded-full bg-linear-to-br from-primary to-primary-end text-base-100 shadow shadow-shadow-primary">
        <span class="text-base-100 tracking-wide font-semibold">{{ $initial }}</span>
    </div>
    <div class="is-drawer-close:hidden flex flex-col overflow-hidden ml-3">
        <span class="text-sm font-semibold whitespace-nowrap tracking-wide">{{ $name }}</span>
        <span class="text-[11px] whitespace-nowrap text-text-muted">{{ $email }}</span>
    </div>
</div>
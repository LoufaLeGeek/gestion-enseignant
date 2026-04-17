{{-- Logo block --}}
@props(["role" => ''])

<li class="is-drawer-close:justify-center w-full h-fit flex items-center gap-3 p-3 rounded-xl cursor-pointer transition-all duration-200 ease-in
            is-drawer-open:bg-tint-primary
            is-drawer-open:border-2
            is-drawer-open: border-border-primary-light

">
    <div
        class="h-11 w-11 shrink-0 rounded-xl flex items-center justify-center shadow-md shadow-shadow-primary bg-linear-to-br from-primary to-primary-end">
        <x-heroicon-o-academic-cap class="h-7 w-7 text-base-100" />
    </div>

    <div class="is-drawer-close:hidden flex flex-col overflow-hidden">
        <span class="text-[14px] font-semibold whitespace-nowrap tracking-wide">
            Gestion Enseignants
        </span>
        <span class="text-[11px] whitespace-nowrap text-primary/80">
            {{ $role }}
        </span>
        <span
            class="mt-1.5 text-[9px] font-bold tracking-widest px-2.5 py-0.5 rounded-full w-fit border bg-tint-primary-soft text-primary border-border-primary-mid">
            V 2.0
        </span>
    </div>
</li>
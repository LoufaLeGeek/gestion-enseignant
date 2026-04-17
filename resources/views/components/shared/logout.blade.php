{{-- Logout --}}
@props(['route' => '#'])

<form action="" class="w-full h-fit">
    <button type="submit"
        class="w-full flex items-center justify-center text-logout-text bg-logout-bg rounded-lg border border-logout-border p-4 cursor-pointer hover:bg-logout-border transition-all duration-200">
        <x-heroicon-o-arrow-right-on-rectangle class="h-5 w-5" />
        <span class="ml-3 block font-medium text-[14px] is-drawer-close:hidden ">
            Déconnexion
        </span>
    </button>
</form>
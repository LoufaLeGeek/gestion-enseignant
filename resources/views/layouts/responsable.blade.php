<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? config('app.name') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @livewireStyles
</head>

<body>
    <div class="drawer lg:drawer-open">
        <input id="my-drawer-4" type="checkbox" class="drawer-toggle" />
        <div class="drawer-content">
            <!-- Navbar -->
            <nav class="navbar w-full bg-base-100 sticky top-0 z-10">
                <label for="my-drawer-4" aria-label="open sidebar" class="toggle-btn">
                    <!-- Sidebar toggle icon -->
                    <x-heroicon-o-bars-3 class="h-5 w-5" />
                </label>

                {{-- Breadcrumb --}}
                <div class="flex items-center gap-2 px-4 text-sm">
                    <span class="text-text-muted tracking-wide">Responsable</span>
                    <x-heroicon-o-chevron-right class="h-3 w-3 text-text-muted" />
                    <span class="font-medium tracking-wide">{{ $breadcrumb ?? 'Dashboard' }}</span>
                </div>
            </nav>

            <!-- Page content here -->
            <div class="p-4">
                {{ $slot }}
            </div>
        </div>

        <div class="drawer-side is-drawer-close:overflow-visible">
            <label for="my-drawer-4" aria-label="close sidebar" class="drawer-overlay"></label>
            <div
                class="flex min-h-full flex-col items-start bg-base-200 is-drawer-close:w-18 is-drawer-open:w-64 border-r-2 border-base-300 shadow-sm">

                <!-- Sidebar content here -->
                <ul class="w-full grow bg-base-200 flex flex-col items-center gap-10 p-2">

                    {{-- Logo block --}}
                    <x-shared.logo role="Responsable" />

                    <!-- Menu bar -->
                    <nav class="grow w-full flex flex-col items-center gap-1">

                        {{-- Label menu --}}
                        <span
                            class="is-drawer-close:justify-center is-drawer-open:pl-2 w-full flex items-center gap-2 text-[10px] font-semibold tracking-wider uppercase text-text-muted/70 transition-all duration-200 ">
                            <span class="is-drawer-close:hidden whitespace-nowrap">Menu de navigation</span>
                            <span class="is-drawer-open:hidden text-text-muted/40">Menu</span>
                        </span>

                        @php
                            $items = [
                                [
                                    'route' => 'responsable.enseignants',
                                    'label' => 'Enseignants',
                                    'icon' => 'heroicon-o-identification', // Chapeau de diplômé pour le corps enseignant
                                ],
                                [
                                    'route' => 'responsable.affectations',
                                    'label' => 'Affectations',
                                    'icon' => 'heroicon-o-arrows-right-left', // Liste de contrôle pour les affectations
                                ],
                                [
                                    'route' => 'responsable.departements',
                                    'label' => 'Départements',
                                    'icon' => 'heroicon-o-building-office-2', // Architecture pour l'organisation structurelle
                                ],
                                [
                                    'route' => 'responsable.filieres',
                                    'label' => 'Filières',
                                    'icon' => 'heroicon-o-academic-cap', // Groupement pour les parcours d'études
                                ],
                             

                            ];
                        @endphp

                        @foreach ($items as $item)
                            {{-- Nav Item --}}
                            <x-shared.nav-item :route="$item['route']" :label="$item['label']" :icon="$item['icon']" />
                        @endforeach

                        {{-- Espaceur --}}
                        <div class="w-full grow"></div>


                        {{-- Export excel : aide a la decision --}}
                        <livewire:responsable.export-excel-file/>

                        {{-- Profil --}}
                        <livewire:shared.profile />

                        {{-- Logout --}}
                        <x-shared.logout route="logout" />

                    </nav>
                </ul>
            </div>
        </div>
    </div>

    @livewireScripts
</body>

</html>
<?php

use Livewire\Component;

new class extends Component {

    public $filiere;

    public $matieres = [];

    public function mount($filiere)
    {
        $this->filiere = $filiere;

        $this->matieres = [
            [
                'id' => 1,
                'code' => 'INF101',
                'intitule' => 'Algorithmique',
                'volumeCM' => 30,
                'volumeTD' => 20,
                'semestre' => 'S1',
            ],
            [
                'id' => 2,
                'code' => 'INF102',
                'intitule' => 'Programmation C',
                'volumeCM' => 25,
                'volumeTD' => 25,
                'semestre' => 'S1',
            ],
        ];
    }
};
?>

<div>

    {{-- BOUTON VOIR --}}
    <button onclick="view_filiere_{{ $filiere['id'] }}.showModal()" class="flex items-center gap-1.5 px-3 py-1.5 rounded-lg
               bg-linear-to-br from-primary to-primary-end
               text-base-100 text-[11px] font-bold
               shadow-sm hover:brightness-110 active:scale-95 transition">

        <x-heroicon-o-eye class="h-4 w-4" />
        Voir plus
    </button>

    {{-- MODAL --}}
    <dialog id="view_filiere_{{ $filiere['id'] }}" class="modal modal-bottom sm:modal-middle">

        <div class="modal-box max-w-2xl p-0 overflow-hidden border-none shadow-2xl">

            {{-- HEADER --}}
            <x-shared.header-modal title="Détails de la filière" subtitle="{{ $filiere['nom'] }}"
                icon="heroicon-o-academic-cap" tint="bg-primary/10" border="border-primary/20" text="text-primary" />

            {{-- BODY --}}
            <div class="p-6 space-y-5">

                {{-- KPI --}}
                <livewire:shared.card-kpi label="Matières" :value="count($matieres)" subtext="Total dans la filière"
                    icon="heroicon-o-book-open" iconBg="bg-primary/10" iconColor="text-primary"
                    textColor="text-primary" />

                {{-- LISTE --}}
                <div class="space-y-2">
                    <p class="text-xs font-bold uppercase text-base-content/50">
                        Liste des matières
                    </p>

                    @foreach ($matieres as $m)
                        <div class="flex items-center justify-between
                                        px-3 py-2 rounded-xl border border-base-200 bg-base-100">

                            <div>
                                <p class="text-[11px] font-bold">{{ $m['code'] }}</p>
                                <p class="text-[12px]">{{ $m['intitule'] }}</p>
                                <p class="text-[10px] text-base-content/50">
                                    {{ $m['volumeCM'] }}h CM • {{ $m['volumeTD'] }}h TD • {{ $m['semestre'] }}
                                </p>
                            </div>

                            <button class="text-[11px] text-error font-semibold hover:underline">
                                Retirer
                            </button>

                        </div>
                    @endforeach
                </div>

                {{-- BOUTON AJOUT (appel composant) --}}
                <div class="pt-4 border-t border-base-200 flex justify-end">

                    <livewire:responsable.create-matiere :filiere="$filiere" :key="'create-matiere-' . $filiere['id']" />

                </div>

            </div>

        </div>

        <form method="dialog" class="modal-backdrop">
            <button>close</button>
        </form>

    </dialog>

</div>
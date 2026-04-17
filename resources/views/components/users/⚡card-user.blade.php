<?php

use Livewire\Component;

new class extends Component {
    public $user;
    public string $initials = '';
    public $r;
    public $roleConfig = [
        'admin' => [
            'label' => 'Administrateur',
            'short' => 'ADMIN',
            'icon' => 'heroicon-o-shield-check',
            'from' => 'from-role-admin',
            'to' => 'to-role-admin-end',
            'tint' => 'bg-role-admin-tint',
            'border' => 'border-role-admin-border',
            'text' => 'text-role-admin-text',
            'dot' => 'bg-primary',
        ],
        'enseignant' => [
            'label' => 'Enseignant',
            'short' => 'PROF',
            'icon' => 'heroicon-o-academic-cap',
            'from' => 'from-role-teacher',
            'to' => 'to-role-teacher-end',
            'tint' => 'bg-role-teacher-tint',
            'border' => 'border-role-teacher-border',
            'text' => 'text-role-teacher-text',
            'dot' => 'bg-success',
        ],
        'responsable' => [
            'label' => 'Responsable',
            'short' => 'RESP',
            'icon' => 'heroicon-o-user-group',
            'from' => 'from-role-manager',
            'to' => 'to-role-manager-end',
            'tint' => 'bg-role-manager-tint',
            'border' => 'border-role-manager-border',
            'text' => 'text-role-manager-text',
            'dot' => 'bg-warning',
        ],
        'comptable' => [
            'label' => 'Comptable',
            'short' => 'COMPT',
            'icon' => 'heroicon-o-banknotes',
            'from' => 'from-role-accountant',
            'to' => 'to-role-accountant-end',
            'tint' => 'bg-role-accountant-tint',
            'border' => 'border-role-accountant-border',
            'text' => 'text-role-accountant-text',
            'dot' => 'bg-error',
        ],
    ];


    public function mount($user)
    {
        $this->user = $user;
        $this->r = $this->roleConfig[$this->user->role] ?? $this->roleConfig['admin'];
        $words = explode(' ', $this->user->name);
        $this->initials = strtoupper(substr($words[0], 0, 1) . (isset($words[1]) ? substr($words[1], 0, 1) : ''));
    }
};
?>


<div
    class="bg-base-100 rounded-2xl border-2 border-base-300 overflow-hidden hover:-translate-y-1 hover:shadow-sm transition-all duration-300 group">

    <div class="p-4 pb-3">
        {{-- Header : Avatar & Status --}}
        <div class="flex items-center justify-between mb-3">
            <div class="flex items-center gap-2.5">
                <div class="h-10.5 w-10.5 shrink-0 rounded-xl flex items-center justify-center
                                font-semibold text-base-100
                                bg-linear-to-br {{ $r['from'] }} {{ $r['to'] }}
                                shadow-sm
                                group-hover:scale-110 group-hover:rotate-3 transition-transform duration-500
                                ">
                    {{ $initials }}
                </div>
                <div>
                    <p class="text-[14px] font-semibold leading-tight">{{ $user->name }}</p>
                    <p class="text-[11px] text-text-muted leading-tight">{{ $user->email }}</p>
                </div>
            </div>
            <div class="h-2 w-2 rounded-full {{ $r['dot'] }}"></div>
        </div>

        {{-- Bloc rôle --}}
        <div class="flex items-center justify-between px-3 py-2.5 rounded-xl bg-base-200 border border-base-300">
            <div class="flex items-center gap-2">
                <div class="h-6.5 w-6.5 rounded-lg flex items-center justify-center {{ $r['tint'] }}">
                    <x-dynamic-component :component="$r['icon']" class="h-3.5 w-3.5 {{ $r['text'] }}" />
                </div>
                <div>
                    <p class="text-[10px] text-text-muted">Rôle</p>
                    <p class="text-[12px] font-semibold {{ $r['text'] }}">{{ $r['label'] }}</p>
                </div>
            </div>
            <span class="text-[9px] font-bold tracking-widest px-2 py-1 rounded-full
                             {{ $r['tint'] }} {{ $r['text'] }} border {{ $r['border'] }}">
                {{ $r['short'] }}
            </span>
        </div>
    </div>

    <div class="h-px bg-base-200"></div>

    {{-- Footer --}}
    <div class="px-4 py-2.5 flex items-center justify-between bg-base-100">
        <div class="flex items-center gap-1.5">
            <x-heroicon-o-calendar-days class="h-3 w-3 text-text-muted" />
            <span class="text-[11px] text-text-muted">{{ $user->date }}</span>
        </div>
        <div class="flex gap-1.5">

            <input type="checkbox" checked="checked" class="toggle toggle-lg  text-base-200 bg-base-300  border-none transition-all duration-300 
                checked:text-base-100  bg-linear-to-br {{ $r['from'] }} {{ $r['to'] }}" />
            <button class="h-7.5 w-7.5 flex items-center justify-center rounded-lg
                               bg-red-50 border border-red-100
                               hover:bg-red-100 transition-all group">
                <x-heroicon-o-trash class="h-3.5 w-3.5 text-red-500" />
            </button>
        </div>
    </div>
</div>
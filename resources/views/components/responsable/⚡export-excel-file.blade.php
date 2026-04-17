<?php
use Livewire\Component;

new class extends Component {
  
};
?>

<div wire:click="export" wire:loading.attr="disabled" @class([
    'group w-full h-fit flex items-center cursor-pointer border border-border-subtle py-2 rounded-lg bg-base-300 transition-all duration-200',
    'hover:bg-gray-200 hover:border-primary/30',
    'is-drawer-close:justify-center is-drawer-open:px-2',
    'opacity-80' => false 
])>

    <div
        class="h-8 w-8 shrink-0 flex items-center justify-center rounded-full bg-linear-to-br from-primary to-primary-end text-base-100 shadow shadow-shadow-primary transition-transform group-active:scale-95">
        <x-heroicon-o-document-arrow-down wire:loading.remove wire:target="export" class="h-5 w-5" />
        <span wire:loading wire:target="export" class="loading loading-spinner loading-xs"></span>
    </div>

    <div class="is-drawer-close:hidden flex flex-col overflow-hidden ml-3">
        <span class="text-sm font-semibold whitespace-nowrap tracking-wide flex items-center gap-2">
            <span wire:loading.remove wire:target="export">Exporter les données</span>
            <span wire:loading wire:target="export">Préparation...</span>
        </span>
        <span class="text-[11px] whitespace-nowrap text-text-muted">Format Microsoft Excel (.xlsx)</span>
    </div>
</div>
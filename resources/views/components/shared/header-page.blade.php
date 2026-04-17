@props([
    'title' => '',
    'nbre' => '',
    'description' => ''
])

<div class="flex flex-col gap-1">
    <div class="flex items-center gap-3">
        <h1 class="text-xl font-medium tracking-tight">
            {{ $title }}
        </h1>
      @if ($nbre)
            <span class="badge badge-primary badge-xs badge-soft">
            {{ $nbre }}
        </span>
      @endif
    </div>
    <p class="text-xs text-text-muted">
        {{ $description }}
    </p>
</div>
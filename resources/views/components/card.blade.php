@props([
    'width' => '2xl',
    'height' => 'auto',
])

@php
    $computedWidth = match($width) {
        'xs' => 'w-48',
        'sm' => 'w-56',
        'md' => 'w-64',
        'lg' => 'w-72',
        'xl' => 'w-80',
        '2xl' => 'w-96',
        default => 'w-96',
    }
@endphp
<div class="flex flex-col shadow rounded-lg {{ "{$computedWidth} {$height}" }} bg-white p-4">
    {{ $slot }}
</div>
<!-- It is quality rather than quantity that matters. - Lucius Annaeus Seneca -->
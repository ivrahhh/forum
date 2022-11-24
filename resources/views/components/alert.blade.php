@props([
    'type' => 'success',
    'message'
])

@php
    $computedStyle = match($type) {
        'success' => 'bg-green-100 border-green-700 text-green-900',
        'danger' => 'bg-red-100 border-red-700 text-red-600',
        default => 'bg-green-100 border-green-700 text-green-900'
    };
@endphp

<div {{ $attributes->merge(["class" => "px-4 py-2 rounded-lg text-sm text-white border {$computedStyle}"]) }}>
    {{ $message }}
</div>
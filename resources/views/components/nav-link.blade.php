@props([
    'active' => false
])

@php
    if($active) {
        $activeStyle = "block w-full px-4 py-3 bg-gray-100 border-r-[6px] border-slate-900";
    } else {
        $activeStyle = "block w-full px-4 py-3";
    }
@endphp

<a {{ $attributes->merge(["class"=>"{$activeStyle}"]) }}>
    {{ $slot }}
</a>
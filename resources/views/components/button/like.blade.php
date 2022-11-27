@props(['likes'])

@php
    $ids = $likes->pluck('id');
    $totalLikes = $likes->count();
    $isLiked = $ids->contains(auth()->id());
@endphp
<button type="button" {{ $attributes->merge(['class' => 'px-4 py-2']) }}>
    {!! $isLiked ? '<i class="fa-solid fa-thumbs-up text-blue-600"></i>' : '<i class="fa-regular fa-thumbs-up"></i>' !!} {{ $totalLikes }}
    {{-- <i class="fa-solid fa-thumbs-up text-blue-600"></i> --}}
</button>
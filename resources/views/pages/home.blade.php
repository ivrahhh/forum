@extends('layouts.main')

@section('content')
    <div class="flex flex-col items-center gap-4">
        @foreach ($posts as $post)
            <x-post-wrapper :date="$post->created_at">
                <x-slot name="info">{{ $post->user->username ?: $post->user->email }}</x-slot>
                <x-slot name="title">{{ $post->title }}</x-slot>
                <x-slot name="content">{{ $post->content }}</x-slot>
            </x-post-wrapper>
        @endforeach
    </div>
    {{ $posts->links('components.pagination') }}
@endsection
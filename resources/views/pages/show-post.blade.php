@extends('layouts.main')

@section('content')
    <x-post-wrapper :date="$post->created_at">
        <x-slot name="info">{{ $post->user->username ?: $post->user->email }}</x-slot>
        <x-slot name="title">{{ $post->title }}</x-slot>
        <x-slot name="content">{{ $post->content }}</x-slot>
        <x-slot name="actions">
            <x-button.like wire:click="toggleLike({{ $post->id }})" :likes="$post->likes" wire:loading.attr="disabled"/>
            <x-button.comment :href="route('posts.show', ['post' => $post->id])"/>
            <x-button.share />  
        </x-slot>
    </x-post-wrapper> 
    <h3 class="block text-xl mt-8 mb-4 cursor-default">
        <i class="fa-regular fa-comments"></i> Comments
    </h3>
    <section class="w-full rounded-lg shadow flex flex-col divide-y">
        @foreach ($post->comments as $comment)
            <x-comment-wrapper :date="$comment->created_at">
                <x-slot name="info">{{ $comment->user->username ?: $comment->user->email }}</x-slot>
                <x-slot name="comment">{{ $comment->comment }}</x-slot>
                <x-slot name="replies">
                    <div class="flex flex-col pl-8 gap-4">
                        @foreach ($comment->replies as $reply)
                            <div class="p-4">
                                <div class="block mb-3">
                                    <span class="font-semibold">
                                        {{ $reply->user->username }}
                                    </span>
                                    <span class="text-xs text-gray-400 block">Posted {{ $reply->created_at->diffForHumans() }}</span>
                                </div>
                                <p class="indent-4 text-sm">
                                    {{ $reply->reply }}
                                </p>
                            </div>
                        @endforeach
                    </div>
                </x-slot>
            </x-comment-wrapper>
        @endforeach
    </section>
@endsection
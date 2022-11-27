{{-- Because she competes with no one, no one can compete with her. --}}
<div class="flex flex-col items-center gap-4">
    @foreach ($posts as $post)
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
    @endforeach
    <div class="p-4 w-full">
        {{ $posts->links('components.pagination') }}
    </div>
</div>

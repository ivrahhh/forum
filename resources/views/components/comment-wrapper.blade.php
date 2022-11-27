@props(['date'])

<div class="flex flex-col p-4">
    <div>
        <div class="block mb-3">
            <span class="font-semibold">
                {{ $info }}
            </span>
            <span class="text-xs text-gray-400 block">Posted {{ $date->diffForHumans() }}</span>
        </div>
        <p class="indent-4 text-sm">
            {{ $comment }}
        </p>
    </div>
    <hr class="my-4">
    {{ $replies }}
</div>
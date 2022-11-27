@props(['date'])

<section class="flex flex-col shadow rounded-lg">
    <div class="p-4">
        <div class="block mb-3">
            {{ $info }}
            <span class="text-xs text-gray-400 block">Posted on : {{ $date }}</span>
        </div>
        <h6 class="text-lg  block mb-4">
            {{ $title }}
        </h6>
        <p class="indent-4 text-sm">
            {{ $content }}
        </p>
    </div>
    <div class="grid grid-cols-3 divide-x border-t">
        {{ $actions }}
    </div>
</section>
<div class="relative" x-data="{ active: false }">
    <div class="text-sm font-semibold cursor-pointer" @click="active = !active">
        {{ $toggler }}
    </div>
    <div
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="transform scale-90 opacity-0"
        x-transition:enter-end="transform scale-100 opacity-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="transform scale-100 opacity-100"
        x-transition:leave-end="transform scale-90 opacity-0"
        x-show="active"
        @click="active = false"
        @click.outside="active = false"
        style="display: none;"
        class="absolute mt-2 right-0 origin-top-right w-48 rounded-lg shadow z-50">
        <div class="bg-slate-900 py-1 rounded-lg text-sm text-white border-t border-gray-500 divide-y divide-gray-500">
            {{ $menu }}
        </div>
    </div>
</div>
@props(['label'])

<!-- You must be the change you wish to see in the world. - Mahatma Gandhi -->
@csrf
<button type="submit" {{ $attributes->merge(['class' => 'block w-full rounded-lg text-sm font-bold text-white bg-slate-900 p-2.5 hover:bg-slate-800 transition ease-in-out duration-300']) }}>
    {{ $label }}
</button>
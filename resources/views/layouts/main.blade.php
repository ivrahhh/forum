<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/22cb3e2ea7.js" crossorigin="anonymous"></script>
    @vite([
        'resources/css/app.css',
        'resources/js/app.js',
    ])
    <title>{{ config('app.name') }}</title>
</head>
<body>
    <header>
        <nav class="px-4 py-3 bg-slate-900 text-gray-200">
            <div class="container flex items-center mx-auto">
                <a href="/" class="">
                    <i class="fa-brands fa-laravel text-3xl"></i>
                </a>
                <div class="ml-auto">
                    <x-dropdown>
                        <x-slot name="toggler">
                            <i class="fa-solid fa-user-circle mr-2"></i>
                            {{ auth()->user()->username ?: auth()->user()->email }}
                            <i class="fa-solid fa-caret-down ml-2"></i>
                        </x-slot>
                        <x-slot name="menu">
                            <a href="" class="block px-4 py-3 text-sm hover:bg-slate-800">Profile</a>
                            <a href="/logout" class="block px-4 py-3 text-sm hover:bg-slate-800">Logout</a>
                        </x-slot>
                    </x-dropdown>
                </div>
            </div>
        </nav>
    </header>
    <div class="flex relative">
        <aside class="sticky top-0 h-screen w-64 py-4 flex flex-col text-sm text-gray-700">
            <x-nav-link href="" class="block w-full px-4 py-3" :active="request()->routeIs('home')">
                <i class="fa-solid fa-house mr-2"></i>Home
            </x-nav-link>
            <x-nav-link href="" class="block w-full px-4 py-3">
                <i class="fa-solid fa-layer-group mr-2"></i>Topics
            </x-nav-link>
            <x-nav-link href="" class="block w-full px-4 py-3">
                <i class="fa-solid fa-cubes-stacked mr-2"></i>Tags
            </x-nav-link>
            <span class="text-sm font-bold px-4 py-2 cursor-default text-black">Posts</span>
            <ul class="px-4">
                <li>
                    <x-nav-link>
                        <i class="fa-solid fa-user-pen mr-2"></i>My Posts
                    </x-nav-link>
                </li>
                <li>
                    <x-nav-link>
                        <i class="fa-solid fa-plus mr-2"></i>Create new post
                    </x-nav-link>
                </li>
            </ul>
        </aside>
        <main class="flex-1 shrink-0 p-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
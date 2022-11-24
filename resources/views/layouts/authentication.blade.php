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
    <main class="flex flex-col items-center">
        <div class="relative mt-20 my-10">
            <i class="fa-brands fa-laravel text-5xl text-red-600"></i>
        </div>
        @yield('content')
    </main>
</body>
</html>
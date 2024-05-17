<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        @vite('resources/css/app.css')
        @viteReactRefresh
        @vite('resources/js/app.jsx')
        @inertiaHead
        @routes
    </head>
    <body class="bg-gray-100">
        @inertia
    </body>
</html>
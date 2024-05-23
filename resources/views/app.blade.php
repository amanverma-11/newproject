<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Laravel</title>
        @vite('resources/css/app.css')
        @vite('resources/js/app.js')
        @vite('resources/js/ziggy.js')
        @inertiaHead
    </head>
    <body class="bg-gray-100">
        @inertia
    </body>
</html>
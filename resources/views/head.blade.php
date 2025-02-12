<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    @if (env('APP_ENV') === 'local')
        <!-- Vite dev server for local -->
        @vite(['resources/js/app.js', 'resources/sass/app.scss'])
    @else
        <!-- Production assets -->
        <link href="{{ asset('build/assets/app-C5PQxqkl.css') }}" rel="stylesheet">
        <link href="{{ asset('build/assets/app-tBZnU75t.css') }}" rel="stylesheet">
        <script src="{{ asset('build/assets/app-XD3OQ2eG.js') }}" type="module"></script>
    @endif
</head>

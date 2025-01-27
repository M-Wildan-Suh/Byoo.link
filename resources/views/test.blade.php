<!DOCTYPE html>

@props(['title', 'titleurl'])

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased w-screen h-full">
        <iframe class=" w-full overflow-hidden h-screen" src="https://multibyoo.sites.id/gorden-bandung" frameborder="0"></iframe>
    </body>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</html>

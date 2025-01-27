@props(['title'])
@props(['templatecolor'])
@props(['navigation'])
@props(['logo'])
@props(['seo'])
<!DOCTYPE html>
<html class=" scroll-smooth" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        {{-- <meta name="description" content="{{$seo->description}}">
        <meta name="keywords" content="{{ implode(', ', $seo->tag->pluck('tag')->toArray()) }}">
        <meta name="robots" content="index, follow">

        @if ($seo->logo_status == "custom")
            <link rel="icon" href="{{ asset('storage/images/seo/' . $seo->logo) }}" type="image/x-icon">
        @elseif ($seo->logo_status == "auto")
            <link rel="icon" href="{{ asset('storage/images/logo/' . $logo->logo) }}" type="image/x-icon">
        @endif

        <title>{{$title}}</title> --}}

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        {{-- Fonts 2 --}}
        <style>
            /* latin-ext */
            @font-face {
                font-family: 'Bebas Neue';
                font-style: normal;
                font-weight: 400;
                font-display: swap;
                src: url(https://fonts.gstatic.com/s/bebasneue/v14/JTUSjIg69CK48gW7PXoo9Wdhyzbi.woff2) format('woff2');
                unicode-range: U+0100-02AF, U+0304, U+0308, U+0329, U+1E00-1E9F, U+1EF2-1EFF, U+2020, U+20A0-20AB, U+20AD-20C0, U+2113, U+2C60-2C7F, U+A720-A7FF;
            }
            /* latin */
            @font-face {
                font-family: 'Bebas Neue';
                font-style: normal;
                font-weight: 400;
                font-display: swap;
                src: url(https://fonts.gstatic.com/s/bebasneue/v14/JTUSjIg69CK48gW7PXoo9Wlhyw.woff2) format('woff2');
                unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+0304, U+0308, U+0329, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
            }
        </style>

        {{-- CDN --}}
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@simonwep/pickr/dist/themes/nano.min.css"/>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css"/>

        <!-- Scripts -->
        {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
        <link href="{{ asset('build/assets/app.css') }}" rel="stylesheet" />
    </head>
    <body class="font-sans antialiased">
        <div class="">
            {{ $slot }}
        </div>
    </body>
    
    {{-- Script --}}
    <script src="{{ asset('build/assets/app.js') }}"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/@simonwep/pickr/dist/pickr.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
</html>

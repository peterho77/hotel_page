<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin</title>
        @vite(['resources/js/admin.js'])

        {{-- Fix FOUC --}}
        <style>html{visibility: hidden;opacity:0;}</style>
    </head>

    <body>
        {{-- Page reload --}}
        <div id="pre-loader">
            <div class="loader"></div>
        </div>

        {{-- Header --}}
        <x-admin.header />

        {{-- Main --}}
        {{ $slot }}
    </body>

</html>
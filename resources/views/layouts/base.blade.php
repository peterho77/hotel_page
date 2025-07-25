<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        @vite(['resources/js/app.js'])

        {{-- fix FOUC --}}
        <style>html{visibility: hidden;opacity:0;}</style>
    </head>

    <body>
        {{-- Page reload --}}
        <div id="pre-loader">
            <div class="loader"></div>
        </div>

        {{-- Header --}}
        <x-header/>

        {{-- Main content --}}
        <main>
            {{ $slot }}
        </main>

        {{-- Footer --}}
        <x-footer/>
    </body>

</html>
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/intersect@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <link rel="icon" type="image/x-icon" href="{{asset("pallet.ico")}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.54.1/apexcharts.min.css">
    @livewireStyles
    @vite("resources/scss/app.scss")
    <title>{{ $title ?? 'Page Title' }}</title>
</head>
<body>
<livewire:notification/>

<div class="grid gap-4 p-4 bg-gray-200 min-h-dvh content-start">
    @if(auth()->check())
        <livewire:payment.details/>

        <div x-data="navbar" @scroll.window="checkScroll" class="bg-white p-4 rounded-lg flex justify-between items-center" :class="isScrolled ? 'fixed rounded-none left-0 top-0 border-b-4 border-blue-700 w-full z-10' : ''" x-transition>
            <div class="text-sm">İcraçı : <span class="font-bold">{{auth()->user()->name}}</span></div>

            <x-navbar/>
        </div>
    @endif
    {{ $slot }}

</div>

@livewireScripts
<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('navbar', function () {
            return {
                isScrolled: false,
                checkScroll() {
                    console.log(window.scrollY)
                    this.isScrolled = window.scrollY > 100; // Change this value as needed
                }
            }
        })
    })
</script>
</body>
</html>

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/intersect@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bodymovin/5.9.6/lottie.min.js"></script>

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
        <livewire:payment.details lazy/>
        <livewire:user.create lazy/>
        <livewire:navbar lazy/>
        <livewire:product.create lazy/>
    @endif
    {{ $slot }}

</div>

@livewireScripts
<script>
    var animation = lottie.loadAnimation({
        container: document.getElementById('animation'), // the HTML element
        renderer: 'svg', // or 'canvas'
        loop: true, // loop the animation
        autoplay: true, // start automatically
        path: '/animation.json' // path to your Lottie JSON file
    });
</script>

</body>
</html>

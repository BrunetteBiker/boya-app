<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? 'Page Title' }}</title>
</head>
<body>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @livewireStyles
    @vite("resources/scss/app.scss")
    <title>Document</title>
</head>
<body>
<livewire:notification/>
<div class="grid gap-4 p-4 2xl:px-80 bg-gray-200 min-h-dvh content-start">
    @if(auth()->check())

        <livewire:user.create/>

        <div class="my-container">
            <div class="flex justify-end gap-2 font-medium">
                <a href="{{url('order/dashboard')}}" wire:navigate
                   class="border border-black p-2 text-sm">Sifarişlər</a>
                <a href="{{url('user/dashboard')}}" wire:navigate class="border border-black p-2 text-sm">Müştərilər</a>
                <a href="{{url("product/dashboard")}}" wire:navigate
                   class="border border-black p-2 text-sm">Məhsullar</a>
                <a href="" class="border border-black p-2 text-sm">Şəxsi kabinet</a>
                <a href="{{url("logout")}}" wire:navigate class="border border-black p-2 text-sm">Çıxış</a>
            </div>
        </div>
    @endif
    {{ $slot }}

</div>

@livewireScripts
</body>
</html>

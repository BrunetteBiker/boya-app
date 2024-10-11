<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {

    if (auth()->check()) {
        return redirect("order/dashboard");

    } else {
        return redirect("login");
    }

});

Route::get("login", \App\Livewire\Login::class)->name("login");

Route::middleware("auth")->group(function () {
    Route::prefix("order")->group(function () {

        Route::get("dashboard", \App\Livewire\Order\Dashboard::class);
        Route::get("create", \App\Livewire\Order\Create::class);

    });
    Route::prefix("user")->group(function () {
        Route::get("dashboard", \App\Livewire\User\Dashboard::class);
    });

    Route::prefix("product")->group(function () {

        Route::get("dashboard", \App\Livewire\Product\Dashboard::class);

    });

});

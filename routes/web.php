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

    Route::get("logout", function () {
        auth()->logout();
        return redirect()->route("login");
    });

    Route::prefix("order")->group(function () {

        Route::get("dashboard", \App\Livewire\Order\Dashboard::class);
        Route::get("create", \App\Livewire\Order\Create::class);
        Route::get("details/{id}", \App\Livewire\Order\Details::class);


    });
    Route::prefix("user")->group(function () {
        Route::get("dashboard", \App\Livewire\User\Dashboard::class);
        Route::get("details/{id}", \App\Livewire\User\Details::class);
    });

    Route::prefix("product")->group(function () {

        Route::get("dashboard", \App\Livewire\Product\Dashboard::class);

    });

});

Route::get("generate-executor", function () {
    \App\Models\User::insert([
        "name"=>"Ədalət Məmmədli",
        "role_id"=>1,
        "created_at"=>now()
    ]);
});

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


    Route::get("raport", \App\Livewire\Raport::class);

});


Route::get("print/{id}", function ($id) {

    $order = \App\Models\Order::find($id);
    $data["order"] = $order;

    $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView("print.order", $data);
    $pdf->setPaper("A4", "landscape");
    $filename = "sifariş-$order->pid" . " " . now()->format("d-m-Y h-i") . " .pdf";
    return $pdf->download($filename);
});

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
        Route::get("excel", function () {
            return \Maatwebsite\Excel\Facades\Excel::download(new \App\Exports\Orders(),"file.xlsx");
        });
        Route::get("logs",\App\Livewire\Order\Logs::class);

    })->name("order");

    Route::prefix("user")->group(function () {
        Route::get("dashboard", \App\Livewire\User\Dashboard::class);
        Route::get("details/{id}", \App\Livewire\User\Details::class);
    });

    Route::prefix("product")->group(function () {

        Route::get("dashboard", \App\Livewire\Product\Dashboard::class);

    });

    Route::prefix("payment")->group(function () {

        Route::get("dashboard", \App\Livewire\Payment\Dashboard::class);
        Route::get("print/{id}", function ($id) {
            $payment = \App\Models\Payment::find($id);
            $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView("print.payment", compact("payment"));
            $pdf->setPaper("A5");
            $filename = "ödəniş-qəbzi-" . $payment->pid . "-" . now()->format("d-m-y h-i") . ".pdf";
            return $pdf->download($filename);
        });

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

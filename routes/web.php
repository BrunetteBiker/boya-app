<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;


Route::get("generate-data", function () {

    foreach (range(1, 50) as $item) {
        $user = new User();
        $user->name = fake()->name();
        $user->old_debt = fake()->randomFloat(2, 0, 1000);
        $user->balance = fake()->randomFloat(2, 0, 1000);
        $user->role_id = fake()->randomElement(\App\Models\UserRole::query()->get()->pluck("id")->toArray());
        $user->remnant = fake()->randomFloat(2, 0, 2000);
        $user->save();
        $user->pid = "USR" . $user->created_at->format("dmy") . Str::of($user->id)->padLeft(6, 0);
        $user->save();

        \App\Models\Phone::query()->insert([
            "user_id" => $user->id,
            "item" => fake()->numerify("0##-###-##-##")
        ]);
    }

    foreach (range(1, 500) as $item) {
        $order = new \App\Models\Order();
        $order->customer_id = fake()->randomElement(User::query()->get()->pluck("id")->toArray());
        $order->executor_id = fake()->randomElement(User::query()->where("role_id", 1)->get()->pluck("id")->toArray());
        $order->save();

        foreach (range(1, fake()->numberBetween(1, 5)) as $orderItemIndex) {
            $orderItem = new \App\Models\OrderItem();
            $orderItem->order_id = $order->id;
            $orderItem->product_id = fake()->randomElement(\App\Models\Product::query()->get()->pluck("id")->toArray());
            $orderItem->amount = fake()->numberBetween(1, 10);
            $orderItem->price = fake()->randomFloat(2);
            $orderItem->total = round($orderItem->amount * $orderItem->price);
            $orderItem->receipt = fake()->word();
            $orderItem->save();
        }

        $order->amount = \App\Models\OrderItem::query()->where("order_id", $order->id)->sum("total");
        $order->amount = round($order->amount, 2);
        $order->discount = fake()->randomFloat(2,0 , $order->amount);
        $order->total = $order->amount - $order->discount;
        $order->total = round($order->total,2);
        $order->save();
    }


});

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
            return \Maatwebsite\Excel\Facades\Excel::download(new \App\Exports\Orders(), "file.xlsx");
        });
        Route::get("logs", \App\Livewire\Order\Logs::class);

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

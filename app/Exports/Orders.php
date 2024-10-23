<?php

namespace App\Exports;

use App\Models\Order;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class Orders implements FromView
{
    protected $filters;

    public function __construct()
    {
    }


    public function view(): View
    {
//        $orders = Order::query()->orderBy("id", "desc")->get();

        return $this->view("exports.orders", [
            "orders" => Order::all()
        ]);
    }
}

<?php

namespace App\Exports;

use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class Orders implements FromView
{

    protected $filters = [];

    public function __construct($filters)
    {
        $this->filters = $filters;
    }

    public function view(): View
    {

        $filters = collect($this->filters)->filter();
        $createdAt = collect($this->filters["createdAt"])->filter();
        $total = collect($this->filters["total"])->filter();
        $discount = collect($this->filters["discount"])->filter();
        $paid = collect($this->filters["paid"])->filter();
        $debt = collect($this->filters["debt"])->filter();


        $items = Order::query();

        if ($filters->has("pid")) {
            $items = $items->where("pid", "like", "%" . $filters["pid"] . "%");
        }

        if ($filters->has("customer")) {
            $items = $items->whereHas("customer", function ($query) use ($filters) {
                $query->where("name", "like", "%" . $filters["customer"] . "%");
            });
        }

        if ($filters->has("executor")) {
            $items = $items->whereHas("executor", function ($query) use ($filters) {
                $query->where("name", "like", "%" . $filters["executor"] . "%");
            });
        }

        if ($filters->has("status")) {
            $items = $items->whereIn("status_id", $filters["status"]);
        }

        if ($createdAt->isNotEmpty()) {

            if ($createdAt->count() == 1) {
                $items = $items->whereDate("created_at", Carbon::make($createdAt->first())->format("Y-m-d"));
            } else {
                $items = $items->whereDate("created_at", ">=", Carbon::make($createdAt->first())->format("Y-m-d"));
                $items = $items->whereDate("created_at", "<=", Carbon::make($createdAt->last())->format("Y-m-d"));
            }
        }

        if ($total->isNotEmpty()) {

            if ($total->has("min")) {
                $items = $items->where("total", ">=", $total["min"]);
            }
            if ($total->has("max")) {
                $items = $items->where("total", "<=", $total["max"]);
            }
        }

        if ($discount->isNotEmpty()) {

            if ($discount->has("min")) {
                $items = $items->where("discount", ">=", $total["min"]);
            }
            if ($discount->has("max")) {
                $items = $items->where("discount", "<=", $total["max"]);
            }
        }

        if ($paid->isNotEmpty()) {

            if ($paid->has("min")) {
                $items = $items->where("paid", ">=", $paid["min"]);
            }
            if ($paid->has("max")) {
                $items = $items->where("paid", "<=", $paid["max"]);
            }
        }

        if ($debt->isNotEmpty()) {

            if ($debt->has("min")) {
                $items = $items->where("debt", ">=", $debt["min"]);
            }
            if ($debt->has("max")) {
                $items = $items->where("debt", "<=", $debt["max"]);
            }
        }


        $orders = $items->get();

        return view("export.orders", compact("orders"));
    }
}

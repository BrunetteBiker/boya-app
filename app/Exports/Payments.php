<?php

namespace App\Exports;

use App\Models\Payment;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class Payments implements FromView
{
    /**
     * @return \Illuminate\Support\Collection
     */

    protected $filters = [];

    public function __construct($filters)
    {
        $this->filters = $filters;
    }

    public function view(): View
    {

        $filters = collect($this->filters)->filter();

        $amount = collect($filters["amount"])->filter();

        $createdAt = collect($filters["createdAt"])->filter();

        $items = Payment::query();

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

        if ($filters->has("cancelledBy")) {
            $items = $items->whereHas("cancelledBy", function ($query) use ($filters) {
                $query->where("name", "like", "%" . $filters["cancelledBy"] . "%");
            });
        }

        if ($filters->has("types")) {
            $items = $items->whereIn("type_id", $filters["types"]);
        }

        if ($filters->has("action")) {
            $items = $items->where("action_id", $filters["action"]);
        }

        if ($filters->has("isCancelled")) {
            if ($filters["isCancelled"] == -1) {
                $filters["isCancelled"] = 0;
            }
            $items = $items->where("is_cancelled", $filters["isCancelled"]);
        }

        if ($amount->isNotEmpty()) {

            if ($amount->count() == 1) {
                $items = $items->where("amount", $amount->first());
            } else {
                $items = $items->where("amount", ">=", $amount->first());
                $items = $items->where("amount", "<=", $amount->first());
            }
        }

        if ($createdAt->isNotEmpty()) {

            if ($createdAt->count() == 1) {
                $date = Carbon::make($createdAt->first())->format("Y-m-d");
                $items = $items->whereDate("created_at", $date);
            } else {
                $min = Carbon::make($createdAt->first())->format("Y-m-d");
                $max = Carbon::make($createdAt->first())->format("Y-m-d");
                $items = $items->whereDate("created_at", ">=", $min);
                $items = $items->whereDate("created_at", "<=", $max);
            }

        }


        $payments = $items->get();


        return view("export.payments", compact("payments"));


    }
}

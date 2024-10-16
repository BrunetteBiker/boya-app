<?php

namespace App\Livewire\Order;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

#[Title("Sifarişlər")]
class Dashboard extends Component
{

    use WithPagination;

    #[Url]
    public $orderBy = [
        'col' => 'id',
        'sort' => 'desc'
    ];

    #[Url]
    public $filters = [
        'pid' => '',
        'customer' => '',
        'executor' => '',
        'status' => [],
        'total' => [
            "min" => '',
            'max' => ''
        ],
        'debt' => [
            "min" => '',
            'max' => ''
        ],
        'paid' => [
            "min" => '',
            'max' => ''
        ],
        'discount' => [
            "min" => '',
            'max' => ''
        ],
        'createdAt' => [
            "min" => '',
            'max' => ''
        ],
    ];


    function search($reset = false)
    {

        $this->resetPage();

        if ($reset) {
            $this->reset(["filters"]);
        }

        $this->orders();
    }


    function mount()
    {


    }

    #[Computed]
    function orders()
    {
        $filters = collect($this->filters)->filter();
        $createdAt = collect($this->filters["createdAt"])->filter();
        $total = collect($this->filters["total"])->filter();
        $discount = collect($this->filters["discount"])->filter();
        $paid = collect($this->filters["paid"])->filter();
        $debt = collect($this->filters["debt"])->filter();


        $items = Order::query();

        if ($filters->has("pid")) {
            $items = $items->where("id", "like", "%" . $filters["pid"] . "%");
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
                $items = $items->whereDate("created_at", $createdAt->first());
            } else {
                $items = $items->whereDate("created_at", ">=", $createdAt->first());
                $items = $items->whereDate("created_at", "<=", $createdAt->last());
            }
        }

        if ($total->isNotEmpty()) {

            if ($total->has("min")) {
                $items = $items->where("total", ">=", $total["min"]);
            } else {
                $items = $items->where("total", "<=", $total["max"]);
            }
        }

        if ($discount->isNotEmpty()) {

            if ($discount->has("min")) {
                $items = $items->where("discount", ">=", $total["min"]);
            } else {
                $items = $items->where("discount", "<=", $total["max"]);
            }
        }

        if ($paid->isNotEmpty()) {

            if ($paid->has("min")) {
                $items = $items->where("paid", ">=", $paid["min"]);
            } else {
                $items = $items->where("paid", "<=", $paid["max"]);
            }
        }

        if ($debt->isNotEmpty()) {

            if ($debt->has("min")) {
                $items = $items->where("debt", ">=", $debt["min"]);
            } else {
                $items = $items->where("debt", "<=", $debt["max"]);
            }
        }


        $items = $items->orderBy($this->orderBy['col'], $this->orderBy['sort']);
        $items = $items->paginate(10);

        return $items;
    }

    public function render()
    {
        return view('livewire.order.dashboard');
    }
}

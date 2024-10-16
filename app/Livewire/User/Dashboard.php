<?php

namespace App\Livewire\User;

use App\Models\Phone;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Dashboard extends Component
{

    use WithPagination;

    public $sortings = [
        "id|desc" => "Qeydiyyat tarixi (öncə yenilər)",
        "id|asc" => "Qeydiyyat tarixi (öncə köhnələr)",
        "name|asc" => "Ad və soyad (əlifba sırası ilə)",
        "name|desc" => "Ad və soyad (əlifba sırasının əksinə)",
        "balance|asc" => "Balans üzrə (azdan çoxa)",
        "balance|desc" => "Balans üzrə (çoxdan aza)",
        "debt|asc" => "Borc üzrə (azdan çoxa)",
        "debt|desc" => "Borc üzrə (çoxdan aza)",
    ];
    public $currentSorting = "id|desc";
    public $searchState = false;

    public $filters = [
        "pid" => "",
        "name" => "",
        "phone" => "",
        "roles" => [],
        "balance" => [
            "min" => "",
            "max" => "",
        ],
        "debt" => [
            "min" => "",
            "max" => "",
        ],
        "remnant" => [
            "min" => "",
            "max" => "",
        ],
        "registeredAt" => [
            "min" => "",
            "max" => "",
        ],
    ];

    function mount()
    {

    }

    function search($reset = false)
    {
        if ($reset) {
            $this->reset('filters');
        }
        $this->resetPage();
        $this->users();


    }

    function updated($prop)
    {
        if ($prop == "currentSorting") {
            $this->resetPage();
        }
    }

    #[On("refresh-users")]
    function refresh()
    {
        $this->reset("filters");
        $this->resetPage();
    }

    #[Computed]
    function users()
    {
        $orderBy = Str::of($this->currentSorting)->explode("|")->collect();
        $filters = collect($this->filters)->map(function ($item, $key) {
            if (is_array($item)) {
                $item = collect($item);
                if ($item->filter()->isNotEmpty()) {
                    return $item->toArray();
                }
            } elseif ($item != "" || !$item) {
                return $item;
            }
        })->filter();

        $items = User::query();

        $items = $items->orderBy($orderBy->first(), $orderBy->last());

        if ($filters->has("pid")) {
            $items = $items->where("id", "like", "%" . $filters["pid"] . "%");
        }
        if ($filters->has("name")) {
            $items = $items->where("name", "like", "%" . $filters["name"] . "%");
        }
        if ($filters->has("phone")) {
            $items = $items->whereHas("phones", function ($query) use ($filters) {
                $query->where("item", "like", "%" . $filters["phone"] . "%");
            });
        }

        if ($filters->has("roles")) {
            $items = $items->whereIn("role_id", $filters["roles"]);
        }

        if ($filters->has("balance")) {
            if ($filters->has("min")) {
                $items = $items->where("balance", ">=", $filters["balance"]["min"]);
            }
            if ($filters->has("max")) {
                $items = $items->where("balance", "<=", $filters["balance"]["max"]);
            }
        }

        if ($filters->has("debt")) {
            if ($filters->has("min")) {
                $items = $items->where("debt", ">=", $filters["debt"]["min"]);
            }
            if ($filters->has("max")) {
                $items = $items->where("debt", "<=", $filters["debt"]["max"]);
            }
        }

        if ($filters->has("remnant")) {
            if ($filters->has("min")) {
                $items = $items->where("remnant", ">=", $filters["remnant"]["min"]);
            }
            if ($filters->has("max")) {
                $items = $items->where("remnant", "<=", $filters["remnant"]["max"]);
            }
        }

        if ($filters->has("registeredAt")) {
            if ($filters->has("min")) {
                $items = $items->whereDate("created_at", ">=", $filters["registeredAt"]["min"]);
            }
            if ($filters->has("max")) {
                $items = $items->whereDate("created_at", "<=", $filters["registeredAt"]["max"]);
            }
        }


        $items = $items->paginate(10);

        return $items;
    }


    public function render()
    {
        return view('livewire.user.dashboard');
    }
}

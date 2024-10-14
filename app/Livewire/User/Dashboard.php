<?php

namespace App\Livewire\User;

use App\Models\Phone;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Dashboard extends Component
{

    use WithPagination;

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

    #[On("refresh-users")]
    function refresh()
    {
        $this->reset("filters");
        $this->resetPage();
    }
    #[Computed]
    function users()
    {
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

        $items = $items->whereNot("id", Auth::id());

        $items = $items->paginate(10);

        return $items;
    }


    public function render()
    {
        return view('livewire.user.dashboard');
    }
}

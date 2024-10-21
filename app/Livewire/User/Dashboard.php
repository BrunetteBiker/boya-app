<?php

namespace App\Livewire\User;

use App\Models\Phone;
use App\Models\User;
use App\Models\UserRole;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

#[Title("İstifadəçilər")]
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
        "oldDebt" => [
            "min" => "",
            "max" => "",
        ],
        "currentDebt" => [
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

    #[Url(except: "")]
    public $searchKeyword;

    function mount()
    {
    }

    function search($reset = false)
    {
        if ($reset == true) {
            $this->reset('filters');
        }
        $this->resetPage();
    }

    function updated($prop)
    {
        if ($prop == "currentSorting") {
            $this->resetPage();
        }

        if ($prop == "searchKeyword") {
            $this->reset("filters");
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
        $filters = collect($this->filters)->filter();
        $balance = collect($filters->get("balance"))->filter();
        $debt = collect($filters->get("debt"))->filter();
        $currentDebt = collect($filters->get("currentDebt"))->filter();
        $oldDebt = collect($filters->get("oldDebt"))->filter();
        $remnant = collect($filters->get("remnant"))->filter();
        $registeredAt = collect($filters->get("registeredAt"))->filter();


        $items = User::query();

        $items = $items->orderBy($orderBy->first(), $orderBy->last());

        if ($this->searchKeyword != "") {

            $searchKeyword = $this->searchKeyword;
            $items = $items->where("name", "like", "%$searchKeyword%");

        } else {
            if ($filters->has("pid")) {
                $items = $items->where("pid", "like", "%" . $filters["pid"] . "%");
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

            if ($balance->isNotEmpty()) {
                if ($balance->count() == 1) {
                    $items = $items->where("balance", $balance->first());
                } else {
                    $items = $items->where("balance", ">=", $balance->first());
                    $items = $items->where("balance", "<=", $balance->last());
                }
            }

            if ($debt->isNotEmpty()) {
                if ($debt->count() == 1) {
                    $items = $items->where("debt", $debt->first());
                } else {
                    $items = $items->where("debt", ">=", $debt->first());
                    $items = $items->where("debt", "<=", $debt->last());
                }
            }

            if ($oldDebt->isNotEmpty()) {
                if ($oldDebt->count() == 1) {
                    $items = $items->where("old_debt", $oldDebt->first());
                } else {
                    $items = $items->where("old_debt", ">=", $oldDebt->first());
                    $items = $items->where("old_debt", "<=", $oldDebt->last());
                }
            }

            if ($currentDebt->isNotEmpty()) {
                if ($currentDebt->count() == 1) {
                    $items = $items->where("current_debt", $currentDebt->first());
                } else {
                    $items = $items->where("current_debt", ">=", $currentDebt->first());
                    $items = $items->where("current_debt", "<=", $currentDebt->last());
                }
            }

            if ($remnant->isNotEmpty()) {
                if ($remnant->count() == 1) {
                    $items = $items->where("remnant", $remnant->first());
                } else {
                    $items = $items->where("remnant", ">=", $remnant->first());
                    $items = $items->where("remnant", "<=", $remnant->last());
                }
            }

            if ($registeredAt->isNotEmpty()) {
                if ($registeredAt->count() == 1) {
                    $date = Carbon::make($registeredAt->first())->format("Y-m-d");
                    $items = $items->whereDate("created_at", $date);
                } else {
                    $date = Carbon::make($registeredAt->first())->format("Y-m-d");
                    $items = $items->whereDate("created_at", ">=", $date);
                    $date = Carbon::make($registeredAt->last())->format("Y-m-d");
                    $items = $items->whereDate("created_at", "<=", $date);
                }
            }

        }


        $items = $items->paginate(2);

        return $items;
    }


    public function render()
    {
        return view('livewire.user.dashboard');
    }
}

<?php

namespace App\Livewire\User;

use App\Models\Phone;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Computed;
use Livewire\Component;

class Dashboard extends Component
{

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

    }

    #[Computed]
    function users()
    {
        $filters = collect($this->filters)->map(function ($item, $key) {

            if (is_array($item)){
            }

        });


        dd($filters);

        $items = User::query();

        $items = $items->whereNot("id", Auth::id());

        $items = $items->paginate(10);

        return $items;
    }


    public function render()
    {

        return view('livewire.user.dashboard');
    }
}

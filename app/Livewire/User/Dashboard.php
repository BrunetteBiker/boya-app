<?php

namespace App\Livewire\User;

use App\Models\User;
use Livewire\Attributes\Computed;
use Livewire\Component;

class Dashboard extends Component
{


    #[Computed]
    function users()
    {
        $items = User::query();


        $items = $items->paginate(10);

        return $items;
    }


    public function render()
    {

        return view('livewire.user.dashboard');
    }
}

<?php

namespace App\Livewire\Order;

use App\Models\User;
use Livewire\Attributes\Computed;
use Livewire\Component;

class Create extends Component
{



    #[Computed]
    function customers()
    {
        $items = User::query();
        $items = $items->where('is_executor', false);

        $items = $items->paginate(5);
        return $items;
    }

    public function render()
    {
        return view('livewire.order.create');
    }
}

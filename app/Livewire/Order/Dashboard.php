<?php

namespace App\Livewire\Order;

use App\Models\Order;
use App\Models\User;
use Livewire\Attributes\Computed;
use Livewire\Component;

class Dashboard extends Component
{

    public $orderBy = [
        'col' => 'id',
        'sort' => 'desc'
    ];

    public $filters = [
        'pid' => '',
        'customer' => '',
        'executor' => '',
        'status' => [],
        'createdAt' => [
            "min" => '',
            'max' => ''
        ],
    ];



    #[Computed]
    function orders()
    {
        $items = Order::query();

        $items = $items->orderBy($this->orderBy['col'], $this->orderBy['sort']);
        $items = $items->paginate(10);

        return $items;
    }

    public function render()
    {
        return view('livewire.order.dashboard');
    }
}

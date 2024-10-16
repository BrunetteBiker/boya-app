<?php

namespace App\Livewire\Order;

use App\Events\PaymentLog;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

#[Title("Yeni sifariş blankı")]
class Create extends Component
{

    use WithPagination;

    public $customer = [
        "state" => false,
        "id" => null,
        "data" => null
    ];

    function selectCustomer($id)
    {
        $user = User::find($id);
        $this->customer["state"] = false;
        $this->customer["data"] = $user;
    }

    public $summary = [
        "total" => 0,
        "subTotal" => 0,
        "discount" => 0,
        "paid" => 0,
        "debt" => 0,
        "addToBalance" => 0,
        "note" => ""
    ];
    public $orderItemTemplate = [
        "productId" => "",
        "note" => "",
        "price" => 0,
        "amount" => 0,
        "total" => 0,
    ];
    public $orderItems = [];


    function selectedProduct($index)
    {
        $this->orderItems[$index]["note"] = Product::find($this->orderItems[$index]["productId"])->note;
    }


    function calculate()
    {
        foreach ($this->orderItems as $index => $orderItem) {
            $total = (float)$orderItem["price"] * (float)$orderItem["amount"];
            $total = round($total, 2);
            $this->orderItems[$index]["total"] = $total;
        }

        $this->summary["total"] = collect($this->orderItems)->sum("total");
        $this->summary["subTotal"] = $this->summary["total"] - $this->summary["discount"];
        $this->summary["debt"] = $this->summary["subTotal"] - (float)$this->summary["paid"];
        $this->summary["debt"] = round($this->summary["debt"], 2);

    }

    function addOrderItem()
    {
        $this->orderItems[] = $this->orderItemTemplate;
    }

    function removeOrderItem($index)
    {
        unset($this->orderItems[$index]);

        $this->orderItems = array_values($this->orderItems);
    }

    function mount()
    {
        $this->orderItems[] = $this->orderItemTemplate;
    }

    public $searchUser = '';

    #[Computed]
    function users()
    {
        $users = User::query();

        if ($this->searchUser != '') {
            $keyword = $this->searchUser;
            $users = $users->where("id", "like", "%$keyword%")
                ->orWhere("name", "like", "%$keyword%")
                ->orWhere("debt", "like", "%$keyword%")
                ->orWhere("balance", "like", "%$keyword%")
                ->orWhereHas("phones", function ($query) use ($keyword) {
                    $query->where("item", "like", "%$keyword%");
                })
                ->orWhereHas("role", function ($query) use ($keyword) {
                    $query->where("name", "like", "%$keyword%");
                });

        }

        $users = $users->paginate(7);

        return $users;
    }

    #[Computed]
    function products()
    {
        return Product::query()->orderBy("name", "asc")->get();
    }

    function save()
    {
        $vData["order"] = $this->summary;
        $vData["customer"] = $this->customer;
        $vData["orderItems"] = $this->orderItems;


        $validator = Validator::make($vData, [
            "customer.id"=>"required",
            "orderItems.*.productId"=>"required",
            "orderItems.*.price"=>"required",
            "orderItems.*.amount"=>"required"
        ]);



        if ($validator->fails()){
            $this->dispatch("notify",state : "warning",msg : $validator->errors()->first());
            return;
        }


        $order = new Order();
        $order->customer_id = $this->customer["id"];
        $order->executor_id = Auth::id();
        $order->status_id = 1;
        $order->amount = $this->summary["total"];
        $order->discount = $this->summary["discount"];
        $order->total = $this->summary["subTotal"];
        $order->debt = $this->summary["debt"];
        $order->paid = $this->summary["paid"];
        $order->notes = $this->summary["note"];
        $order->save();


        foreach ($this->orderItems as $item) {
            $orderItem = new OrderItem();
            $orderItem->order_id = $order->id;
            $orderItem->product_id = $item["productId"];
            $orderItem->amount = $item["amount"];
            $orderItem->price = $item["price"];
            $orderItem->total = $item["total"];
            $orderItem->save();
        }

        if ($order->paid > 0) {
            event(new PaymentLog(orderId: $order->id, customerId: $order->customer_id, amount: $order->paid, typeId: 1, note: "Borc ödənişi"));
        }

        return $this->dispatch("notify", state: "success", msg: "Sifariş qeydə alındı", redirect: url("order/details/$order->id"));

    }

    function render()
    {
        return view('livewire.order.create');
    }
}

<?php

namespace App\Livewire\Order;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Title;
use Livewire\Component;


class Create extends Component
{

    #[Title("Yeni sifariş blankı")]
    public $addToBalance = false;
    public $subTotal = 0;
    public $discount = 0;

    public $final = 0;

    public $paid = 0;
    public $debt = 0;
    public $notes = "";


    public $orderItems = [
        [
            "recommendedInterval" => null,
            "productId" => null,
            "price" => "",
            "amount" => 0,
            "total" => 0,
            "receipt" => ""
        ]
    ];

    public $customerSection = false;

    public $searchCustomer = '';

    #[Computed]
    function customers()
    {
        $items = User::query();

        $items = $items->where("role_id", 2);

        if ($this->searchCustomer != '') {
            $items = $items->where("name", "like", "%" . $this->searchCustomer . "%");
        }

        $items = $items->paginate(10);

        return $items;

    }

    public $customerId;

    public $customer = "";

    #[Computed]
    function products()
    {
        return Product::orderBy("name", "asc")->get();
    }

    function productInfo($index)
    {
        $this->orderItems[$index]["recommendedInterval"] = Product::find($this->orderItems[$index]["productId"])->recommendedInterval() . " AZN";
    }

    function updated($prop)
    {
        if ($prop == "customerId") {
            $this->customer = User::find($this->customerId)->name;
            $this->customerSection = false;
        }
    }

    function calculate()
    {
        foreach ($this->orderItems as $index => $orderItem) {
            $total = (float)$orderItem["price"] * (float)$orderItem["amount"];
            $total = round($total, 1);
            $this->orderItems[$index]["total"] = $total;
        }

        $this->subTotal = collect($this->orderItems)->sum('total');
        $this->final = $this->subTotal - (float)$this->discount;
        $this->debt = $this->final - (float)$this->paid;
        $this->debt = round($this->debt, 1);


    }

    function addOrderItem()
    {
        $this->orderItems[] = [
            "recommendedInterval" => null,
            "productId" => null,
            "price" => '',
            "amount" => 0,
            "total" => 0,
            "receipt" => ""
        ];
    }

    function removeOrderItem($index)
    {
        unset($this->orderItems[$index]);

        $this->orderItems = array_values($this->orderItems);
    }

    function save()
    {

        $orderItems = [];
        foreach ($this->orderItems as $index => $orderItem) {
            $orderItems[] = collect($orderItem)->filter()->toArray();
        }

        $validator = Validator::make([
            'customer' => $this->customerId,
            "orderItems" => $orderItems
        ], [
            "customer" => "required",
            "orderItems.*.productId" => "required",
            "orderItems.*.price" => "required|numeric",
            "orderItems.*.amount" => "required|numeric",
            "orderItems.*.receipt" => "required",
        ], [
            "customer.required" => "Müştəri seçilməlidir",
            "orderItems.*.productId.required" => ":position. məhsul seçilməlidir",
            "orderItems.*.price" => ":position. məhsulun qiyməti daxil edilməlidir",
            "orderItems.*.amount" => ":position. məhsulun miqdarı daxil edilməlidir",
            "orderItems.*.receipt" => ":position. məhsulun tərkibi daxil edilməlidir",
        ]);

        if ($validator->fails()) {
            $this->dispatch("notify", state: "warning", msg: $validator->errors()->first());
            return;
        }

        $order = new Order();
        $order->executor_id = Auth::id();
        $order->customer_id = $this->customerId;
        $order->status_id = 1;
        $order->amount = $this->subTotal;
        $order->discount = $this->discount;
        $order->total = $this->final;
        $order->save();

        foreach ($orderItems as $orderItem) {
            OrderItem::insert([
                "order_id" => $order->id,
                "product_id" => $orderItem["productId"],
                "amount" => $orderItem["amount"],
                "price" => $orderItem["price"],
                "total" => $orderItem["total"]
            ]);
        }

        $customer = User::find($this->customerId);

        if ($this->debt < 0 && $this->addToBalance) {
            $customer->increment("balance", abs($this->debt));
        }

        if ($this->debt > 0) {
            $customer->increment("debt", $this->debt);
        }


        $this->dispatch("notify", state: "success", msg: "Yeni sifariş qeydə alındı", redirect: url("order/dashboard"));


    }

    public function render()
    {
        return view('livewire.order.create');
    }
}

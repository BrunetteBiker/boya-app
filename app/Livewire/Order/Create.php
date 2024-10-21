<?php

namespace App\Livewire\Order;

use App\Events\PaymentLog;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

#[Title("Yeni sifariş blankı")]
class Create extends Component
{

    use WithPagination;

    public $receipts = [];

    function searchReceipts($term, $index)
    {
        if ($term != "") {
            $this->receipts[$index] = OrderItem::query()->where("receipt", "like", "%$term%")->distinct()->get()->pluck("receipt")->toArray();
        } else {
            $this->receipts[$index] = [];
        }
    }

    public $customer = [
        "state" => false,
        "id" => null,
        "data" => null
    ];

    function selectCustomer($id)
    {
        $user = User::find($id);
        $this->customer["id"] = $id;
        $this->customer["state"] = false;
        $this->customer["data"] = $user;
    }

    public $summary = [
        "total" => 0,
        "subTotal" => 0,
        "discount" => 0,
        "note" => ""
    ];
    public $orderItemTemplate = [
        "productId" => "",
        "note" => "",
        "price" => null,
        "amount" => null,
        "total" => null,
        "receipt" => "",
    ];
    public $orderItems = [];


    function updatedOrderItems()
    {
        $this->calculate();
    }

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

    }

    function addOrderItem()
    {
        $this->orderItems[] = $this->orderItemTemplate;
        $this->receipts[] = [];
    }

    function removeOrderItem($index)
    {
        unset($this->orderItems[$index]);

        unset($this->receipts[$index]);

        $this->orderItems = array_values($this->orderItems);
        $this->receipts = array_values($this->receipts);
    }

    function mount()
    {
        if (request()->has("customer")) {
            $this->customer["id"] = request()->get("customer");
            $this->selectCustomer(request()->get("customer"));
            $this->customer["state"] = false;
        }

        $this->orderItems[] = $this->orderItemTemplate;

        $this->receipts[] = [];
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
            "customer.id" => "required",
            "orderItems.*.productId" => "required",
            "orderItems.*.price" => "required",
            "orderItems.*.amount" => "required",
            "orderItems.*.receipt" => "required"
        ], [
            "customer.id.required" => "Müştəri seçilməlidir",
            "orderItems.*.productId.required" => ":position. məhsulun çeşidi daxil edilməlidir",
            "orderItems.*.price.required" => ":position. məhsulun qiyməti daxil edilməlidir",
            "orderItems.*.amount.required" => ":position. məhsulun miqdarı daxil edilməlidir",
            "orderItems.*.receipt.required" => ":position. məhsulun tərkibi daxil edilməlidir",
        ]);

        if ($validator->fails()) {
            $this->dispatch("notify", state: "warning", msg: $validator->errors()->first());
            return;
        }

        $order = new Order();
        $order->customer_id = $this->customer["id"];
        $order->executor_id = Auth::id();
        $order->status_id = 1;
        $order->amount = $this->summary["total"];
        $order->discount = $this->summary["discount"];
        $order->total = $this->summary["subTotal"];
        $order->debt = $order->total;
        $order->notes = $this->summary["note"];
        $order->save();

        $order->pid = "SFR" . $order->created_at->format("dmY") . Str::of($order->id)->padLeft(6, 0);
        $order->save();

        $order->customer->current_debt = Order::where("customer_id", $order->customer_id)->sum("debt");
        $order->customer->debt = $order->customer->old_debt + $order->customer->current_debt;
        $order->customer->save();

        foreach ($this->orderItems as $item) {
            $orderItem = new OrderItem();
            $orderItem->order_id = $order->id;
            $orderItem->receipt = $item["receipt"];
            $orderItem->product_id = $item["productId"];
            $orderItem->amount = $item["amount"];
            $orderItem->price = $item["price"];
            $orderItem->total = $item["total"];
            $orderItem->save();
        }

        return $this->dispatch("notify", state: "success", msg: "Sifariş qeydə alındı", redirect: url("order/details/$order->id"));

    }

    function render()
    {
        return view('livewire.order.create');
    }
}

<?php

namespace App\Livewire\User;

use App\Events\AcceptPayment;
use App\Events\AddModifyLog;
use App\Events\RecordUpdate;
use App\Models\ModifyLog;
use App\Models\Order;
use App\Models\OrderStatus;
use App\Models\Payment;
use App\Models\Phone;
use App\Models\UpdateLog;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title("İstifadəçi məlumatları")]
class Details extends Component
{

    public $states = [
        "lastOrders" => true,
        "lastPayments" => false,
        "modifyLogs" => false
    ];

    public $user;
    public $personalData;

    public $paymentData = [
        "type" => null,
        "action" => null,
        "amount" => null,
        "note" => ""
    ];

    function acceptPayment()
    {
        $validator = Validator::make($this->paymentData, [
            "action" => "required",
            "type" => "required",
            "amount" => "required",
        ], [
            "action.required" => "Əməliyyat növü seçilməlidir",
            "type.required" => "Ödəniş təsnifatı seçilməlidir",
            "amount.required" => "Məbləğ daxil edilməlidir"
        ]);

        if ($validator->fails()) {

            $this->dispatch("notify", state: "warning", msg: $validator->errors()->first());
            return;
        }

        switch ($this->paymentData["type"]) {
            case 1:
                if ($this->paymentData["action"] == 1) {
                    $this->user->increment("old_debt", $this->paymentData["amount"]);
                } else {
                    if ($this->paymentData["amount"] > $this->user->old_debt) {
                        $this->user->old_debt = 0;
                    } else {
                        $this->user->decrement("old_debt", $this->paymentData["amount"]);
                    }
                }
                $this->user->debt = $this->user->old_debt + $this->user->current_debt;
                $this->user->save();
                break;
            case 2 :
                if ($this->paymentData["action"] == 1) {
                    $this->user->increment("balance", $this->paymentData["amount"]);
                } else {
                    if ($this->paymentData["amount"] > $this->user->balance) {
                        $this->dispatch("notify", state: "danger", msg: "Balansda kifayət qədər vəsait yoxdur");
                        return;
                    }
                    $this->user->decrement("balance", $this->paymentData["amount"]);
                }
                break;
            case 3:
                if ($this->paymentData["action"] == 1) {
                    $this->user->increment("remnant", $this->paymentData["amount"]);
                } else {
                    if ($this->paymentData["amount"] > $this->user->remnant) {
                        $this->user->remnant = 0;
                        $this->user->save();
                    } else {
                        $this->user->decrement("remnant", $this->paymentData["amount"]);
                    }
                }
                break;
        }

        event(new AcceptPayment(order: null, customer: $this->user->id, amount: $this->paymentData["amount"], type: $this->paymentData["type"], action: $this->paymentData["action"], note: ""));

        $this->dispatch("notify", state: "success", msg: "Sorğunuz qeydə alındı");


    }

    function mount($id)
    {
        $this->user = User::findOrFail($id);
        $this->personalData = $this->user->toArray();
        $this->personalData["phones"] = $this->user->phones->pluck("item")->toArray();
        if (count($this->personalData["phones"]) == 0) {
            $this->personalData["phones"] = [""];
        }
    }

    #[Computed]
    function payments()
    {
        $items = Payment::query();
        $items = $items->where("customer_id", $this->user->id);

        return $items->paginate(pageName: 'payments', perPage: 10);
    }

    #[Computed]
    function orders()
    {
        $items = Order::query();
        $items = $items->where([
            "customer_id" => $this->user->id,
        ]);

        $items = $items->orderBy("id", "desc")->paginate(5);

        return $items;
    }

    #[Computed]
    function updateLogs()
    {
        $items = UpdateLog::query();

        $items = $items->paginate(10);

        return $items;
    }

    function addPhone()
    {
        $this->personalData["phones"][] = "";
    }

    function removePhone($index)
    {
        unset($this->personalData["phones"][$index]);
        $this->personalData["phones"] = array_values($this->personalData["phones"]);

    }

    function updateUser()
    {

        $currentPhones = $this->user->phones->pluck("item");

        $personalData = collect($this->personalData)->filter();

        $phones = collect($personalData["phones"])->filter();

        if ($this->user->phones->isEmpty() && $phones->isEmpty()) {
            $this->dispatch("notify", state: "warning", msg: "Ən az bir ədəd əlaqə nömrəsi daxil edilməlidir");
            return;
        } elseif ($phones->isNotEmpty()) {

            if ($currentPhones->isNotEmpty()) {
                Phone::where("user_id", $this->user->id)->delete();
            }

            $validator = Validator::make($phones->toArray(), [
                "*" => "unique:phones,item"
            ], [
                "*.unique" => ":position . sırada daxil edilən əlaqə nömrəsi istifadə edilmişdir"
            ]);

            if ($validator->fails()) {
                if ($currentPhones->isNotEmpty()) {
                    foreach ($currentPhones as $item) {
                        Phone::insert([
                            "user_id" => $this->user->id,
                            "item" => $item
                        ]);
                    }
                }
                $this->dispatch("notify", state: "warning", msg: $validator->errors()->first());
                return;
            }

            foreach ($phones as $phone) {
                Phone::insert([
                    "user_id" => $this->user->id,
                    "item" => $phone
                ]);
            }


        }

        if ($personalData->has("name")) {
            $this->user->name = $personalData["name"];
        }

        $this->user->save();

        $this->dispatch("notify", state: "success", msg: "Düzəlişlər qeydə alındı", autoHide: true);

        event(new RecordUpdate(userId: $this->user->id, note: Auth::user()->name . " tərəfindən şəxsi məlumatlar üzərində düzəliş edildi."));


    }

    #[Computed]
    function orderSummary()
    {

        $data = [];
        $data[] = [
            "count" => Order::where("customer_id", $this->user->id)->count() . " ədəd",
            "amount" => round(Order::where("customer_id", $this->user->id)->sum("total"), 2) . " AZN",
            "name" => "Ümumi sifarişlər"
        ];

        foreach (OrderStatus::all() as $orderStatus) {
            $data[] = [
                "count" => Order::where([
                        "customer_id"=> $this->user->id,
                        "status_id"=>$orderStatus->id
                    ])->count() . " ədəd",
                "amount" => round(Order::where([
                        "customer_id"=> $this->user->id,
                        "status_id"=>$orderStatus->id
                    ])->sum("total"), 2) . " AZN",
                "name" => $orderStatus->name
            ];
        }

        return $data;

    }


    #[Computed]
    function fundsSummary()
    {
        $data[] = [
            "name"=>"Balans",
            "amount"=>$this->user->balance . " AZN"
        ];

        $data[] = [
            "name"=>"Ümumi borc",
            "amount"=>$this->user->debt . " AZN"
        ];

        $data[] = [
            "name"=>"Öncədən olan borc",
            "amount"=>$this->user->old_debt . " AZN"
        ];

        $data[] = [
            "name"=>"Satışlardan yaranmış borc",
            "amount"=>$this->user->current_debt . " AZN"
        ];

        $data[] = [
            "name"=>"Tədarüçkü borcu",
            "amount"=>$this->user->remnant . " AZN"
        ];


        return $data;

    }

    public function render()
    {
        return view('livewire.user.details');
    }
}

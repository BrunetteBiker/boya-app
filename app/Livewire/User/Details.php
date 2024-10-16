<?php

namespace App\Livewire\User;

use App\Events\AcceptPayment;
use App\Events\AddModifyLog;
use App\Events\RecordUpdate;
use App\Models\ModifyLog;
use App\Models\Order;
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
        "amount" => null,
        "note" => ""
    ];


    function acceptPayment()
    {
        $validator = Validator::make($this->paymentData, [
            "type" => "required",
            "amount" => "required",
        ], [
            "type.required" => "Ödəniş təsnifatı seçilməlidir",
            "amount.required" => "Məbləğ daxil edilməlidir"
        ]);

        if ($validator->fails()) {

            $this->dispatch("notify", state: "warning", msg: $validator->errors()->first());
            return;
        }

        switch ($this->paymentData["type"]) {
            case 2 :
                $this->user->increment("balance", $this->paymentData["amount"]);
                break;
            case 3 :
                $this->user->decrement("balance", $this->paymentData["amount"]);
                break;
        }

        event(new AcceptPayment(orderId: null, customerId: $this->user->id, amount: $this->paymentData["amount"], paymentTypeId: $this->paymentData["type"], note: ""));

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

        event(new RecordUpdate(userId: $this->user->id, note: "Şəxsi məlumatlar üzərində " . Auth::user()->name . " tərəfindən düzəliş edildi."));


    }

    public $explanation = "";



    public function render()
    {
        return view('livewire.user.details');
    }
}

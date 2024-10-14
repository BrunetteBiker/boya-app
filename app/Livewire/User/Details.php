<?php

namespace App\Livewire\User;

use App\Events\AddModifyLog;
use App\Models\ModifyLog;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Phone;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Computed;
use Livewire\Component;

class Details extends Component
{

    public $states = [
        "lastOrders" => false,
        "lastPayments" => false,
        "modifyLogs" => false
    ];

    public $user;
    public $personalData;

    public $financialData = [
        "type_id" => null,
        "amount" => null
    ];


    function mount($id)
    {
        $this->user = User::findOrFail($id);
        $this->personalData = $this->user->toArray();
        $this->personalData["phones"] = [];

        if (count($this->personalData["phones"])) {
            $this->personalData["phones"] = [""];
        } else {
            $this->personalData["phones"] = $this->user->phones->pluck("item")->toArray();
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
    function modifyLogs()
    {
        $items = ModifyLog::query();

        $items = $items->where("user_id", $this->user->id);

        $items = $items->paginate();

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

    function modifyUser()
    {
        $oldPhones = $this->user->phones->pluck("item")->toArray();

        Phone::where("user_id", $this->user->id)->delete();

        $this->personalData["phones"] = collect($this->personalData["phones"])->filter()->toArray();

        if (!collect($this->personalData)->has("name")) {
            $this->personalData["name"] = $this->user->name;
        }

        $validator = Validator::make($this->personalData, [
            "phones" => "required|array|min:1",
            "phones.*" => "unique:phones,item"
        ], [
            "phones.required" => "Ən bir ədəd əlaqə nömrəsi daxil edilməlidir",
            "phones.*.unique" => ":position . sırada olan əlaqə nömrəsi istifadə olunmuşdur"
        ]);

        if ($validator->fails()) {

            if (collect($this->personalData)->has("phones")) {
                $this->personalData["phones"] = [""];
            }

            $this->dispatch("notify", state: "warning", msg: $validator->errors()->first());
            return;
        }

        $this->user->name = $this->personalData["name"];
        $this->user->role_id = $this->personalData["role_id"];
        $this->user->remnant = $this->personalData["remnant"];
        $this->user->remnant_currency = $this->personalData["remnant_currency"];
        $this->user->save();

        foreach ($this->personalData["phones"] as $phone) {
            Phone::insert([
                "user_id" => $this->user->id,
                "item" => $phone
            ]);
        }

        $this->dispatch("notify", state: "success", msg: "Düzəlişlər qeydə alındı", autoHide: true);

        event(new AddModifyLog(userId: $this->user->id, note: "İstifadəçi məlumatları üzərində düzəliş edildi"));


    }

    function financialAction()
    {
        $payment = new Payment();
        $payment->executor_id = Auth::id();
        $payment->customer_id = $this->user->id;
        $payment->type_id = $this->financialData["type_id"];
        $payment->amount = $this->financialData["amount"];
        $payment->save();

        switch ($this->financialData["type_id"]) {
            case 1:
                break;
            case 2:
                $this->user->increment("balance", $this->financialData["amount"]);
                break;
            case 3:
                $this->user->decrement("balance", $this->financialData["amount"]);
                break;
            case 4:
                $this->user->decrement("remnant", $this->financialData["amount"]);
                break;
            case 5:
                $this->user->increment("debt", $this->financialData["amount"]);
                break;
        }

        $this->dispatch("notify", state: "success", msg: "Sorğunuz icra olundu", autoHide: true);


    }


    public function render()
    {
        return view('livewire.user.details');
    }
}

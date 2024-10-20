<div class="flex items-start gap-4">
    <div class="w-80 grid gap-4">
        <a href="{{url("order/create?customer=".$user->id)}}" wire:navigate class="my-input bg-white font-semibold inline-flex items-center gap-2 transition hover:text-green-600">
            <svg class="size-7"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
            <span class="text-center flex-1">
            Yeni sifariş
            </span>
        </a>

        <div class="my-container grid gap-4">
            <div class="flex justify-between">
                <h1 class="text-xl font-bold">Şəxsi məlumatlar</h1>
            </div>
            <hr class="border-2 border-black">
            <div class="grid gap-1">
                <div class="my-label">İstifədçi kodu</div>
                <input type="text" class="my-input w-full" disabled value="{{$user->pid()}}">
            </div>
            <div class="grid gap-1">
                <div class="my-label">Qeydiyyat tarixi</div>
                <input type="text" class="my-input w-full" disabled value="{{$user->created_at->format("d-m-Y h:i")}}">
            </div>
            <div class="grid gap-1">
                <div class="my-label">Ad və soyad</div>
                <input type="text" class="my-input w-full" wire:model="personalData.name">
            </div>
            <div class="grid gap-1">
                <div class="my-label">Əlaqə nömrəsi</div>
                <div class="grid gap-2.5">
                    @foreach($personalData["phones"] as $index=>$phone)
                        <div class="flex gap-1">
                            <input type="text" class="my-input w-full text-sm" x-mask="099-999-99-99"
                                   placeholder="012-234-56-78" wire:model="personalData.phones.{{$index}}">
                            <button wire:click="addPhone">
                                <svg class="size-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </button>
                            @if(count($personalData["phones"]) > 1)
                                <button wire:click="removePhone({{$index}})">
                                    <svg class="size-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                </button>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
            <button wire:click="updateUser" class="my-input font-medium transition hover:text-blue-600 inline-flex justify-between items-center">
                <svg class="size-6"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z" />  <polyline points="17 21 17 13 7 13 7 21" />  <polyline points="7 3 7 8 15 8" /></svg>
                Düzəliş et
            </button>
        </div>
    </div>
    <div class="flex-1 grid gap-4">

        <div class="flex flex-wrap gap-3">
            @foreach($this->orderSummary as $orderSummary)
                <div class="my-container min-w-44">
                    <h1 class="text-2xl text-right font-semibold">
                        {{$orderSummary["count"]}} | {{$orderSummary["amount"]}}
                    </h1>
                    <p class="text-sm">{{$orderSummary["name"]}}</p>
                </div>
            @endforeach
        </div>

        <hr class="border-2 border-black">

        <div class="flex flex-wrap gap-4">
            @foreach($this->fundsSummary as $fundsSummary)
                <div class="my-container  min-w-44">
                    <h1 class="text-2xl text-right font-semibold">{{$fundsSummary["amount"]}}</h1>
                    <p class="text-sm">{{$fundsSummary["name"]}}</p>
                </div>
            @endforeach
        </div>

        <div class="my-container grid gap-4">
            <div class="flex gap-4">
                <div class="grid gap-1 flex-1">
                    <div class="my-label">Təsnifat</div>
                    <select class="my-input w-full" wire:model="paymentData.type">
                        <option value="">Seçin</option>
                        @foreach(\App\Models\PaymentType::where("is_manual",true)->orderBy("name","asc")->get() as $paymentType)
                            <option value="{{$paymentType->id}}">{{$paymentType->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="grid gap-1">
                    <div class="my-label">Əməliyyat növü</div>
                    <select class="my-input" wire:model=paymentData.action>
                        <option value="">Seçin</option>
                        @foreach(\App\Models\Action::all() as $action)
                            <option value="{{$action->id}}">{{$action->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="grid gap-1">
                    <div class="my-label">Məbləğ</div>
                    <input type="number" step="0.01" class="my-input w-full" wire:model="paymentData.amount">
                </div>
            </div>

            <div class="grid gap-1">
                <div class="my-label">Qeyd</div>
                <textarea rows="3" class="my-input w-full" wire:model="paymentData.note"></textarea>
            </div>
            <button wire:loading.class="hidden" wire:click="acceptPayment" class="my-input font-medium ml-auto">Mədaxil
                et
            </button>
            <p wire:loading wire:target="acceptPayment" class="ml-auto text-sm font-medium animate-pulse">Sorğunuz icra
                olunur...</p>
        </div>
        <div class="my-container grid gap-4">
            <div class="flex justify-between">
                <h1 class="text-xl font-bold">Ödənişlər</h1>
            </div>
            <hr class="border-2 border-black">
            <div class="grid overflow-auto max-h-96 whitespace-nowrap">
                <table class="my-table">
                    <thead>
                    <th>Əməliyyatlar</th>
                    <th>Ödəniş kodu</th>
                    <th>Təsnifat</th>
                    <th>Əməliyyat</th>
                    <th>Məbləğ</th>
                    <th>Tarix</th>
                    <th>Qeyd</th>
                    </thead>
                    <tbody>
                    @foreach($this->payments as $payment)
                        <tr>
                            <td>
                                <div class="inline-flex gap-2">
                                    <a href="" class="my-input inline-flex gap-1 items-center text-sm">Qəbz çap et</a>
                                    <button class="my-input inline-flex gap-1 items-center text-sm">Ləğv et</button>
                                </div>
                            </td>
                            <td>{{$payment->pid()}}</td>
                            <td>{{$payment->type->name}}</td>
                            <td>{{$payment->action->name}}</td>
                            <td>{{$payment->amount}} AZN</td>
                            <td>{{$payment->created_at->format("d-m-Y h:i:s")}}</td>
                            <td class="whitespace-normal">
                                <p class="line-clamp-1 hover:line-clamp-none">{{$payment->note}}</p>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            {{$this->payments->links()}}
        </div>
    </div>
</div>

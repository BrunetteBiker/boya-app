<div class="flex items-start gap-4">
    <div class="w-80 grid gap-4">
        <a href="{{url("order/create?customer=".$user->id)}}" wire:navigate
           class="btn btn-success btn-large">
            <svg class="size-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
            <span class="text-center flex-1">
            Yeni sifariş
            </span>
        </a>

        <div class="my-container grid gap-3">
            <div class="flex justify-between">
                <h1 class="text-4xl leading-tight font-bold text-blue-700">Şəxsi məlumatlar</h1>
            </div>
            <hr class="border-2 border-zinc-100">
            <div class="grid gap-1">
                <div class="my-label">İstifədçi kodu</div>
                <input type="text" class="input w-full" disabled value="{{$user->pid}}">
            </div>
            <div class="grid gap-1">
                <div class="my-label">Qeydiyyat tarixi</div>
                <input type="text" class="input w-full" disabled value="{{$user->created_at->format("d-m-Y h:i")}}">
            </div>
            <div class="grid gap-1">
                <div class="my-label">Ad və soyad</div>
                <input type="text" class="input w-full" wire:model="personalData.name">
            </div>
            <div class="grid gap-1">
                <div class="my-label">Əlaqə nömrəsi</div>
                <div class="grid gap-2.5">
                    @foreach($personalData["phones"] as $index=>$phone)
                        <div class="flex gap-1">
                            <input type="text" class="input w-full" x-mask="099-999-99-99"
                                   placeholder="012-234-56-78" wire:model="personalData.phones.{{$index}}">
                            <button wire:click="addPhone" class="btn btn-outline btn-small">
                                <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </button>
                            <button wire:click="removePhone({{$index}})" class="btn btn-outline btn-small">
                                <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </button>
                        </div>
                    @endforeach
                </div>
            </div>
            <button wire:click="updateUser"
                    class="btn btn-warning btn-large">
                <svg class="size-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                     stroke-linecap="round" stroke-linejoin="round">
                    <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"/>
                    <polyline points="17 21 17 13 7 13 7 21"/>
                    <polyline points="7 3 7 8 15 8"/>
                </svg>
                <span class="text-center flex-1 text-center">
                    Düzəliş et
                </span>
            </button>
        </div>
    </div>
    <div class="flex-1 grid gap-4">

        <div class="flex flex-wrap gap-3">
            @foreach($this->orderSummary as $orderSummary)
                <div class="p-6 bg-white rounded-lg shadow-md border border-gray-200">
                    <p class="text-2xl font-extrabold text-gray-800">
                        {{$orderSummary["count"]}} | {{$orderSummary["amount"]}}
                    </p>
                    <p class="text-sm font-medium text-gray-600 mt-1.5">{{$orderSummary["name"]}}</p>
                </div>
            @endforeach
        </div>

        <hr class="border-2 border-zinc-100">

        <div class="flex flex-wrap gap-4">
            @foreach($this->fundsSummary as $fundsSummary)
                <div class="p-6 bg-white rounded-lg shadow-md border border-gray-200">
                    <p class="text-2xl font-extrabold text-gray-800">
                        {{$fundsSummary["amount"]}}
                    </p>
                    <p class="text-sm font-medium text-gray-600 mt-1.5">{{$fundsSummary["name"]}}</p>
                </div>

            @endforeach
        </div>

        <div class="my-container grid gap-4">
            <div class="flex justify-between">
                <h1 class="text-4xl font-bold text-blue-700">Maliyyə əməliyyatları</h1>
            </div>
            <hr class="border-2 border-zinc-100">
            <div class="flex gap-4">
                <div class="grid gap-1 flex-1">
                    <div class="my-label">Təsnifat</div>
                    <select class="input w-full" wire:model="paymentData.type">
                        <option value="">Seçin</option>
                        @foreach(\App\Models\PaymentType::where("is_manual",true)->orderBy("name","asc")->get() as $paymentType)
                            <option value="{{$paymentType->id}}">{{$paymentType->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="grid gap-1">
                    <div class="my-label">Əməliyyat növü</div>
                    <select class="input" wire:model=paymentData.action>
                        <option value="">Seçin</option>
                        @foreach(\App\Models\Action::all() as $action)
                            <option value="{{$action->id}}">{{$action->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="grid gap-1">
                    <div class="my-label">Məbləğ</div>
                    <input type="number" step="0.01" class="input w-full" wire:model="paymentData.amount">
                </div>
            </div>
            <div class="grid gap-1">
                <div class="my-label">Qeyd</div>
                <textarea rows="3" class="input w-full" wire:model="paymentData.note"></textarea>
            </div>
            <button wire:loading.class="hidden" wire:click="acceptPayment" class="btn btn-primary btn-large ml-auto">
                <svg class="size-6"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <path d="M9 12l2 2l4 -4" />  <path d="M12 3a12 12 0 0 0 8.5 3a12 12 0 0 1 -8.5 15a12 12 0 0 1 -8.5 -15a12 12 0 0 0 8.5 -3" /></svg>
                Mədaxil et
            </button>
            <p wire:loading wire:target="acceptPayment" class="ml-auto text-sm font-medium animate-pulse">Sorğunuz icra
                olunur...</p>
        </div>
        <div class="my-container grid gap-4">
            <div class="flex justify-between">
                <h1 class="text-4xl font-bold text-blue-700">Ödənişlər</h1>
            </div>
            <hr class="border-2 border-zinc-100">
            <div class="flex gap-2">
                <div class="flex items-center gap-1.5">
                    <div class="my-label">Sıralama</div>
                    <select class="input" wire:model.live="paymentSearch.orderBy">
                        @foreach($paymentSortings as $key=>$paymentSorting)
                            <option value="{{$key}}">{{$paymentSorting}}</option>
                        @endforeach
                    </select>
                </div>
                <input type="text" class="input" placeholder="Ödəniş kodu" wire:model.live="paymentSearch.pid">
            </div>

            <div class="grid overflow-auto max-h-96 whitespace-nowrap">
                <table class="custom-table">
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
                                <button class="btn btn-primary btn-small" wire:click="$dispatch('payment.details.changeState',{id : '{{$payment->id}}'})">
                                    <svg class="size-4"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    Detallar
                                </button>
                            </td>
                            <td>{{$payment->pid}}</td>
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

<div class="grid gap-4">
    <div class="flex justify-end gap-4">
        <a href="{{url("print/$order->id")}}"
           class="btn btn-primary">
            <svg class="size-7" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                 fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z"/>
                <path d="M17 17h2a2 2 0 0 0 2 -2v-4a2 2 0 0 0 -2 -2h-14a2 2 0 0 0 -2 2v4a2 2 0 0 0 2 2h2"/>
                <path d="M17 9v-4a2 2 0 0 0 -2 -2h-6a2 2 0 0 0 -2 2v4"/>
                <rect x="7" y="13" width="10" height="8" rx="2"/>
            </svg>
            Qaiməni çap et
        </a>
    </div>
    <div class="grid grid-cols-2 gap-4 items-start">
        <div class="grid gap-4">
            <div class="my-container grid gap-4" x-data="{state : $wire.entangle('state.generalInfo')}">
                <div class="flex justify-between items-center text-blue-700">
                    <h1 class="text-xl font-bold">Ümumi məlumatlar</h1>
                    <button wire:click="$toggle('state.generalInfo')">
                        <svg class="size-7 transition" :class="{'-rotate-180' : state}" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="6 9 12 15 18 9"/>
                        </svg>
                    </button>
                </div>
                <div x-transition x-show="state" class="grid gap-4">
                    <hr class="border-2 border-zinc-100">
                    <ul class="grid gap-2">
                        <li>Sifariş kodu : <span class="font-semibold">{{$order->pid}}</span></li>
                        <li>Qeydiyyat tarixi : <span
                                class="font-semibold">{{$order->created_at->format("d-m-Y h:i:s")}}</span></li>
                        <li>Status : <span class="font-semibold">{{$order->status->name}}</span></li>
                        @if($order->status_id == 4)
                            <li>Ləğv edən : <span class="font-semibold">{{$order->cancelledBy->name}}</span></li>
                            <li>Ləğv səbəbi : <span class="font-semibold">{{$order->cancel_explanation}}</span></li>
                        @endif
                        <li>Ümumi cəm : <span class="font-semibold">{{$order->amount}} AZN</span></li>
                        <li>Endirim : <span class="font-semibold">{{$order->discount}} AZN</span></li>
                        <li>Yekun : <span class="font-semibold">{{$order->total}} AZN</span></li>
                        <li>Ödənilib : <span class="font-semibold">{{$order->paid}} AZN</span></li>
                        <li>Borc : <span class="font-semibold">{{$order->debt}} AZN</span></li>
                        <li>İcraçı : <span class="font-semibold">{{$order->executor->name}}</span></li>
                    </ul>
                </div>
            </div>
            @if($order->status_id != 4)
                <div class="my-container grid gap-4" x-data="{state : $wire.entangle('state.cancel')}">
                    <div class="flex justify-between items-center text-blue-700">
                        <h1 class="text-xl font-bold">Sifarişin ləğvi</h1>
                        <button wire:click="$toggle('state.cancel')">
                            <svg class="size-7 transition" :class="{'-rotate-180' : state}" viewBox="0 0 24 24"
                                 fill="none"
                                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="6 9 12 15 18 9"/>
                            </svg>
                        </button>
                    </div>
                    <div x-transition x-show="state" class="grid gap-4">
                        <hr class="border-2 border-zinc-100">
                        <div class="grid gap-1">
                            <div class="my-label">Ləğv səbəbi</div>
                            <textarea class="input" rows="3"
                                      wire:model="cancelExplanation" {{$order->status_id == 4 ? "disabled" : ""}}></textarea>
                        </div>
                        @if($order->status_id != 4)
                            <button wire:click="cancelOrder"
                                    class="btn btn-danger ml-auto">
                                <svg class="size-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                                </svg>

                                Təsdiqlə
                            </button>
                        @endif

                    </div>
                </div>
            @endif
        </div>

        <div class="my-container grid gap-4" x-data="{state : $wire.entangle('state.customerInfo')}">
            <div class="flex justify-between items-center text-blue-700">
                <h1 class="text-xl font-bold">Müştəri məlumatları</h1>
                <button wire:click="$toggle('state.customerInfo')">
                    <svg class="size-7 transition" :class="{'-rotate-180' : state}" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="6 9 12 15 18 9"/>
                    </svg>
                </button>
            </div>
            <div x-transition x-show="state" class="grid gap-4">
                <hr class="border-2 border-zinc-100">
                <ul class="grid gap-2">
                    <li>Müştəri kodu : <span class="font-semibold">{{$order->customer->pid}}</span></li>
                    <li>Ad və soyad : <span class="font-semibold">{{$order->customer->name}}</span></li>
                    <li>Əlaqə nömrəsi : <span class="font-semibold">{{$order->customer->phone()}}</span></li>
                    <li>Qeydiyyat tarixi : <span
                            class="font-semibold">{{$order->customer->created_at->format("d-m-Y")}}</span></li>
                    <li>Vəzifə : <span class="font-semibold">{{$order->customer->role->name}}</span></li>
                    <li>Balans : <span class="font-semibold">{{$order->customer->balance}} AZN</span></li>
                    <li>Ümumi borc : <span class="font-semibold">{{$order->customer->debt}} AZN</span></li>
                    <li>Satış borcu : <span class="font-semibold">{{$order->customer->current_debt}} AZN</span></li>
                    <li>Köhnə borc : <span class="font-semibold">{{$order->customer->old_debt}} AZN</span></li>
                </ul>
                <div class="flex gap-2 justify-self-start">
                    <a href="{{url("user/details/$order->customer_id")}}" target="_blank"
                       class="btn btn-outline btn-outline-primary">
                        <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        Ətraflı məlumat
                    </a>
                    <a href="{{url("order/create?customer=$order->customer_id")}}" target="_blank"
                       class="btn btn-success">
                        <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                        Yeni sifariş
                    </a>
                </div>

            </div>
        </div>


    </div>
    <div class="my-container grid gap-4" x-data="{state : $wire.entangle('state.payments')}">
        <div class=" flex justify-between items-center text-blue-700">
            <h1 class="text-xl font-bold">Ödənişlər</h1>
            <button wire:click="$toggle('state.payments')">
                <svg class="size-7 transition" :class="{'-rotate-180' : state}" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="6 9 12 15 18 9"/>
                </svg>
            </button>
        </div>
        <div x-transition x-show="state" class="grid gap-4">
            <hr class="border-2 border-zinc-100">
            <div class="flex gap-4 items-start">
                <div class="flex-1">
                    <table class="custom-table">
                        <thead>
                        <th>Əməliyyatlar</th>
                        <th>Ödəniş kodu</th>
                        <th>Məbləğ</th>
                        <th>Qəbul edən</th>
                        <th>Ödəniş tarixi</th>
                        </thead>
                        <tbody>
                        @forelse($this->payments as $payment)
                            <tr>
                                <td>
                                    <a href="" class="btn btn-outline btn-outline-primary btn-small">
                                        <svg class="size-4" width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                             stroke="currentColor" fill="none" stroke-linecap="round"
                                             stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z"/>
                                            <path
                                                d="M17 17h2a2 2 0 0 0 2 -2v-4a2 2 0 0 0 -2 -2h-14a2 2 0 0 0 -2 2v4a2 2 0 0 0 2 2h2"/>
                                            <path d="M17 9v-4a2 2 0 0 0 -2 -2h-6a2 2 0 0 0 -2 2v4"/>
                                            <rect x="7" y="13" width="10" height="8" rx="2"/>
                                        </svg>
                                        Qəbz çap et
                                    </a>
                                </td>
                                <td>{{$payment->pid}}</td>
                                <td>{{$payment->amount}} AZN</td>
                                <td>{{$payment->executor->name}}</td>
                                <td>{{$payment->created_at->format("d-m-Y h:i:s")}}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="!text-center !p-5 !text-2xl">
                                    Ödəniş tapılmadı
                                </td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
                @if($order->debt > 0 && $order->status_id != 4)
                    <div class="my-container w-80">
                        <form action="" class="grid gap-3">
                            <div class="grid gap-1">
                                <div class="my-label">Qəbul edən</div>
                                <input type="text" class="input" value="{{auth()->user()->name}}" disabled>
                                @if($order->customer->balance > 0)
                                    <label for="pay-from-balance" class="input input-small ml-auto mt-1">
                                        <input type="checkbox" id="pay-from-balance" value="1"
                                               wire:model.live="paymentInfo.fromBalance"
                                               wire:change="set('paymentInfo.addBalance',false)">
                                        <span>Balansdan ödə</span>
                                    </label>
                                @endif
                            </div>

                            <div class="grid gap-1">
                                <div class="my-label">Ödəniş miqdarı</div>
                                <input type="number" step="0.01" class="input" wire:model="paymentInfo.amount"
                                       wire:blur="calculate">
                            </div>

                            @if(!$paymentInfo["fromBalance"] && $paymentInfo["reminder"] > 0)
                                <div class="grid gap-1">
                                    <div class="my-label">Qalıq</div>
                                    <input type="text" class="input" disabled wire:model.live="paymentInfo.reminder">
                                </div>
                            @endif

                            <div class="grid gap-1">
                                <div class="my-label">Cari borc</div>
                                <input type="text" class="input" disabled wire:model.live="paymentInfo.debt">
                            </div>

                            <div class="grid gap-1">
                                <div class="my-label">Qeyd</div>
                                <textarea class="input" rows="3" wire:model="paymentInfo.note"></textarea>
                            </div>

                            <button wire:loading.class="hidden" type="button" wire:click="acceptPayment"
                                    class="btn btn-success btn-large">
                                <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/>
                                </svg>
                                <span class="text-center flex-1">Mədaxil et</span>
                            </button>
                            <p wire:loading wire:target="acceptPayment" class="loading-text">
                                Sorğunuz
                                icra olunur...</p>

                        </form>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <div class="my-container grid gap-4" x-data="{state : $wire.entangle('state.orderItems')}">
        <div class="flex justify-between items-center text-blue-700">
            <h1 class="text-xl font-bold">Məhsullar</h1>
            <button wire:click="$toggle('state.orderItems')">
                <svg class="size-7 transition" :class="{'-rotate-180' : state}" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="6 9 12 15 18 9"/>
                </svg>
            </button>
        </div>
        <div x-transition x-show="state" class="grid gap-4">
            <hr class="border-2 border-zinc-100">
            <table class="custom-table">
                <thead>
                <th>Məhsul</th>
                <th>Tərkib</th>
                <th>Miqdar</th>
                <th>Qiymət</th>
                <th>Cəm</th>
                </thead>
                <tbody>
                @foreach($this->orderItems as $orderItem)
                    <tr>
                        <td>{{$orderItem->product->name}}</td>
                        <td>{{$orderItem->receipt}}</td>
                        <td>{{$orderItem->amount}} ədəd</td>
                        <td>{{$orderItem->price}} AZN</td>
                        <td>{{$orderItem->total}} AZN</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

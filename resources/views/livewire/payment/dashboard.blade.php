<div class="flex items-start gap-4">

    <livewire:payment.cancel/>
    <livewire:payment.details/>

    <div class="grid gap-4 flex-1">
        <div class="flex flex-wrap gap-3">
            @foreach($this->summary as $raport)
                <div class="my-container min-w-44">
                    <p class="text-xl font-bold">
                        <span>{{$raport["count"]}}</span>
                        |
                        <span>{{$raport["fund"]}}</span>
                    </p>
                    <p class="text-sm font-light">{{$raport["name"]}}</p>
                </div>
            @endforeach
        </div>
        <div class="my-container flex items-center gap-3">
            <div class="inline-flex gap-1.5 items-center">
                <div class="my-label">Sıralama</div>
                <select class="my-input text-sm !p-2.5" wire:model.live="filters.orderBy">
                    @foreach($orderBy as $key=>$val)
                        <option value="{{$key}}">{{$val}}</option>
                    @endforeach
                </select>
            </div>
            <input type="text" class="my-input text-sm !p-2.5" placeholder="Ödəniş kodu" wire:model.live="filters.term">
            <button x-data="{state : $wire.entangle('searchState')}" x-transition wire:click="$toggle('searchState')"
                    class="text-sm underline font-medium">
                <span x-show="state">Gizlə</span>
                <span x-show="!state">Ətraflı axtarış</span>
            </button>

        </div>
        <div class="my-container grid overflow-auto">
            <table class="my-table">
                <thead>
                <th>Əməliyyatlar</th>
                <th>Ödəniş kodu</th>
                <th>Status</th>
                <th>Ödəyici</th>
                <th>Qəbul edən</th>
                <th>Təsnifat</th>
                <th>Əməliyyat</th>
                <th>Məbləğ</th>
                <th>Tarix</th>
                </thead>
                <tbody>
                @foreach($this->payments as $payment)
                    <tr @class(["bg-red-50" => $payment->is_cancelled])>
                        <td>
                            <div class="flex gap-2 text-sm leading-none">
                                <button wire:click="$dispatch('payment.details.changeState',{id : '{{$payment->id}}'})" class="my-input !p-2">Detallar</button>
                                @if($payment->type_id == 4 && $payment->is_cancelled == false)
                                    <button wire:click="$dispatch('cancel-payment-change-state',{id : '{{$payment->id}}'})"
                                            class="my-input !p-2">Ləğv et
                                    </button>
                                @endif
                                <a href="{{url("payment/print/$payment->id")}}" class="inline-flex gap-1 items-center !p-2 my-container">
                                    <svg class="size-4"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <path d="M17 17h2a2 2 0 0 0 2 -2v-4a2 2 0 0 0 -2 -2h-14a2 2 0 0 0 -2 2v4a2 2 0 0 0 2 2h2" />  <path d="M17 9v-4a2 2 0 0 0 -2 -2h-6a2 2 0 0 0 -2 2v4" />  <rect x="7" y="13" width="10" height="8" rx="2" /></svg>
                                    Qəbz çap et
                                </a>
                            </div>
                        </td>
                        <td>{{$payment->pid}}</td>
                        <td>
                            @if($payment->is_cancelled)
                                <span
                                    class="inline-block p-2 text-sm font-medium animate-pulse bg-red-600 text-white rounded-full">Ləğv edilib</span>
                            @else
                                <span
                                    class="inline-block p-2 text-sm font-medium animate-pulse bg-green-600 text-white rounded-full">Aktivdir</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{url("user/details/$payment->customer_id")}}" class="underline" wire:navigate>
                                {{$payment->customer->name}}
                            </a>
                        </td>
                        <td>{{$payment->executor->name}}</td>
                        <td>{{$payment->type->name}}</td>
                        <td>{{$payment->action->name}}</td>
                        <td>{{$payment->amount}} AZN</td>
                        <td>{{$payment->created_at->format("d-m-Y h:i:s")}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        @if($this->payments->hasPages())
            <div class="my-container">
                {{$this->payments->links()}}
            </div>
        @endif
    </div>

    <div x-data="{state : $wire.entangle('searchState')}" x-show="state" x-transition
         class="my-container w-80 grid gap-3" wire:keyup.enter="search" wire:keyup.ctrl.enter="search(true)">
        <div class="grid gap-1">
            <div class="my-label">Ödəniş kodu</div>
            <input type="text" class="my-input" wire:model="filters.pid">
        </div>

        <div class="grid gap-1">
            <div class="my-label">Ödəyici</div>
            <input type="text" class="my-input" wire:model="filters.customer">
        </div>

        <div class="grid gap-1">
            <div class="my-label">Qəbul edən</div>
            <input type="text" class="my-input" wire:model="filters.executor">
        </div>

        <div class="grid gap-1">
            <div class="my-label">Ləğv edən</div>
            <input type="text" class="my-input" wire:model="filters.cancelledBy">
        </div>

        <div class="grid gap-1">
            <div class="my-label">Təsnifat</div>
            <div class="grid gap-1.5 my-input">
                @foreach(\App\Models\PaymentType::orderBy("name","asc")->get() as $pt)
                    <label for="pt-{{$pt->id}}" class="cursor-pointer">
                        <input class="outline-0" type="checkbox" value="{{$pt->id}}" id="pt-{{$pt->id}}"
                               wire:model="filters.types">
                        <span>{{$pt->name}}</span>
                    </label>
                @endforeach
            </div>
        </div>

        <div class="grid gap-1">
            <div class="my-label">Əməliyyat</div>
            <div class="grid gap-1.5 my-input">
                <label for="pt-all" class="cursor-pointer">
                    <input class="outline-0" type="radio" value="" id="pt-all" wire:model="filters.action">
                    <span>Ümumi</span>
                </label>
                @foreach(\App\Models\Action::orderBy("name","asc")->get() as $pa)
                    <label for="pa-{{$pa->id}}" class="cursor-pointer">
                        <input class="outline-0" type="radio" value="{{$pa->id}}" id="pa-{{$pa->id}}"
                               wire:model="filters.action">
                        <span>{{$pa->name}}</span>
                    </label>
                @endforeach
            </div>
        </div>

        <div class="grid gap-1">
            <div class="my-label">Status</div>
            <div class="grid gap-1.5 my-input">
                <label for="ps-all" class="cursor-pointer">
                    <input class="outline-0" type="radio" value="" id="ps-all" wire:model="filters.isCancelled">
                    <span>Ümumi</span>
                </label>
                <label for="ps-0" class="cursor-pointer">
                    <input class="outline-0" type="radio" value="1" id="ps-0" wire:model="filters.isCancelled">
                    <span>Ləğv edilib</span>
                </label>
                <label for="ps-1" class="cursor-pointer">
                    <input class="outline-0" type="radio" value="-1" id="ps-1" wire:model="filters.isCancelled">
                    <span>Aktivdir</span>
                </label>
            </div>
        </div>

        <div class="grid gap-1">
            <div class="my-label">Məbləğ</div>
            <div class="grid grid-cols-2 gap-2">
                <input type="number" step="0.01" class="my-input w-full" placeholder="Min."
                       wire:model="filters.amount.min">
                <input type="number" step="0.01" class="my-input w-full" placeholder="Maks."
                       wire:model="filters.amount.max">
            </div>
        </div>

        <div class="grid gap-1">
            <div class="my-label">Tarix</div>
            <div class="grid grid-cols-2 gap-2">
                <div class="grid gap-1">
                    <input type="text" class="my-input w-full" placeholder="Min." wire:model="filters.createdAt.min"
                           x-mask="99-99-9999">
                    <small class="text-xs">Tarixdən</small>
                </div>
                <div class="grid gap-1">
                    <input type="text" class="my-input w-full" placeholder="Maks." wire:model="filters.createdAt.max"
                           x-mask="99-99-9999">
                    <small class="text-xs">Tarixə</small>
                </div>
            </div>
        </div>

        <div class="flex justify-end gap-3 text-sm">
            <button type="button" wire:click="search"
                    class="my-input !p-2.5 transition hover:font-medium inline-flex items-center gap-1">
                <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
                Axtar
            </button>
            <button type="button" wire:click="search('true')"
                    class="my-input !p-2.5 transition hover:font-medium inline-flex items-center gap-1">
                <svg class="size-6" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                     fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z"/>
                    <path d="M19 19h-11l-4 -4a1 1 0 0 1 0 -1.41l10 -10a1 1 0 0 1 1.41 0l5 5a1 1 0 0 1 0 1.41l-9 9"/>
                    <path d="M18 12.3l-6.3 -6.3"/>
                </svg>
                Sıfırla
            </button>
        </div>

    </div>
</div>

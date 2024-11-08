<div class="flex items-start gap-4">

    <div class="grid gap-4 flex-1">
        <x-payment.summary :summary="$this->summary"/>
        <x-payment.time-summary :timeSummary="$this->timeSummary"/>


        <div class="my-container flex items-center gap-3">
            <p class="text-sm">
                Tapıldı : <strong class="font-semibold">{{$this->payments->total()}} ədəd</strong>
            </p>
            <hr class="border h-4">
            <div class="inline-flex gap-1.5 items-center">
                <div class="my-label">Sıralama</div>
                <select class="input" wire:model.live="filters.orderBy">
                    @foreach($orderBy as $key=>$val)
                        <option value="{{$key}}">{{$val}}</option>
                    @endforeach
                </select>
            </div>
            <input type="text" class="input" placeholder="Ödəniş kodu" wire:model.live="filters.term">
            <button x-show="!state" x-data="{state : $wire.entangle('searchState')}" x-transition
                    wire:click="$toggle('searchState')"
                    class="link link-primary link-small">
                <span>Ətraflı axtarış</span>

            </button>

            <button wire:click="export"
                    class="btn btn-outline btn-outline-primary ml-auto">

                <svg class="size-4" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                    <!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                    <path
                        d="M64 0C28.7 0 0 28.7 0 64L0 448c0 35.3 28.7 64 64 64l256 0c35.3 0 64-28.7 64-64l0-288-128 0c-17.7 0-32-14.3-32-32L224 0 64 0zM256 0l0 128 128 0L256 0zM155.7 250.2L192 302.1l36.3-51.9c7.6-10.9 22.6-13.5 33.4-5.9s13.5 22.6 5.9 33.4L221.3 344l46.4 66.2c7.6 10.9 5 25.8-5.9 33.4s-25.8 5-33.4-5.9L192 385.8l-36.3 51.9c-7.6 10.9-22.6 13.5-33.4 5.9s-13.5-22.6-5.9-33.4L162.7 344l-46.4-66.2c-7.6-10.9-5-25.8 5.9-33.4s25.8-5 33.4 5.9z"/>
                </svg>

                <span wire:loading wire:target="export"
                      class="animate-pulse font-light">Məlumat emal olunur...</span>
                <span wire:target="export" wire:loading.class="hidden">
                        Excel faylı
                    </span>
            </button>

        </div>
        <div class="my-container grid overflow-auto">
            <table class="custom-table">
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
                                <button wire:click="$dispatch('payment.details.changeState',{id : '{{$payment->id}}'})"
                                        class="btn btn-outline btn-outline-primary btn-small">
                                    <svg class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    Detallar
                                </button>
                                <a href="{{url("payment/print/$payment->id")}}"
                                   class="btn btn-outline btn-small whitespace-nowrap">
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
                            </div>
                        </td>
                        <td>{{$payment->pid}}</td>
                        <td>
                            <p class="whitespace-nowrap">
                                @if($payment->is_cancelled)
                                    <span
                                        class="inline-block p-2 text-sm font-medium bg-red-600 text-white rounded-full">Ləğv edilib</span>
                                @else
                                    <span
                                        class="inline-block p-2 text-sm font-medium bg-green-600 text-white rounded-full">Aktivdir</span>
                                @endif
                            </p>

                        </td>
                        <td>
                            <a href="{{url("user/details/$payment->customer_id")}}"
                               class="underline hover:no-underline hover:text-sky-600" wire:navigate>
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
         class="my-container z-10 w-80 grid gap-3" wire:keyup.enter="search" wire:click.outside="search(true)">
        <div class="flex justify-between gap-4 items-center text-blue-700">
            <h1 class="text-3xl font-semibold">Ətraflı axtarış</h1>
            <button wire:click="$toggle('searchState')">
                <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </button>
        </div>
        <hr class="border-2 border-zinc-100">
        <div class="grid gap-1">
            <div class="my-label">Ödəniş kodu</div>
            <input type="text" class="input w-full" wire:model="filters.pid">
        </div>

        <div class="grid gap-1">
            <div class="my-label">Ödəyici</div>
            <input type="text" class="input w-full" wire:model="filters.customer">
        </div>

        <div class="grid gap-1">
            <div class="my-label">Qəbul edən</div>
            <input type="text" class="input w-full" wire:model="filters.executor">
        </div>

        <div class="grid gap-1">
            <div class="my-label">Ləğv edən</div>
            <input type="text" class="input w-full" wire:model="filters.cancelledBy">
        </div>

        <div class="grid gap-1">
            <div class="my-label">Təsnifat</div>
            <div class="grid gap-1.5">
                @foreach(\App\Models\PaymentType::orderBy("name","asc")->get() as $pt)
                    <label for="pt-{{$pt->id}}" class="input cursor-pointer">
                        <input class="outline-0" type="checkbox" value="{{$pt->id}}" id="pt-{{$pt->id}}"
                               wire:model="filters.types">
                        <span>{{$pt->name}}</span>
                    </label>
                @endforeach
            </div>
        </div>

        <div class="grid gap-1">
            <div class="my-label">Əməliyyat</div>
            <div class="grid gap-1.5">
                <label for="pt-all" class="input cursor-pointer">
                    <input class="outline-0" type="radio" value="" id="pt-all" wire:model="filters.action">
                    <span>Ümumi</span>
                </label>
                @foreach(\App\Models\Action::orderBy("name","asc")->get() as $pa)
                    <label for="pa-{{$pa->id}}" class="input cursor-pointer">
                        <input class="outline-0" type="radio" value="{{$pa->id}}" id="pa-{{$pa->id}}"
                               wire:model="filters.action">
                        <span>{{$pa->name}}</span>
                    </label>
                @endforeach
            </div>
        </div>

        <div class="grid gap-1">
            <div class="my-label">Status</div>
            <div class="grid gap-1.5">
                <label for="ps-all" class="input cursor-pointer">
                    <input class="outline-0" type="radio" value="" id="ps-all" wire:model="filters.isCancelled">
                    <span>Ümumi</span>
                </label>
                <label for="ps-0" class="input cursor-pointer">
                    <input class="outline-0" type="radio" value="1" id="ps-0" wire:model="filters.isCancelled">
                    <span>Ləğv edilib</span>
                </label>
                <label for="ps-1" class="input cursor-pointer">
                    <input class="outline-0" type="radio" value="-1" id="ps-1" wire:model="filters.isCancelled">
                    <span>Aktivdir</span>
                </label>
            </div>
        </div>

        <div class="grid gap-1">
            <div class="my-label">Məbləğ</div>
            <div class="grid grid-cols-2 gap-2">
                <input type="number" step="0.01" class="input w-full" placeholder="Min."
                       wire:model="filters.amount.min">
                <input type="number" step="0.01" class="input w-full" placeholder="Maks."
                       wire:model="filters.amount.max">
            </div>
        </div>

        <div class="grid gap-1">
            <div class="my-label">Tarix</div>
            <div class="grid grid-cols-2 gap-2">
                <div class="grid gap-1">
                    <input type="text" class="input w-full" placeholder="Min." wire:model="filters.createdAt.min"
                           x-mask="99-99-9999">
                    <small class="text-xs">Tarixdən</small>
                </div>
                <div class="grid gap-1">
                    <input type="text" class="input w-full" placeholder="Maks." wire:model="filters.createdAt.max"
                           x-mask="99-99-9999">
                    <small class="text-xs">Tarixə</small>
                </div>
            </div>
        </div>

        <div class="flex justify-end gap-3 text-sm">
            <button type="button" wire:click="search"
                    class="btn btn-primary">
                <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
                Axtar
            </button>
            <button type="button" wire:click="search('true')"
                    class="btn btn-disabled !cursor-pointer">
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

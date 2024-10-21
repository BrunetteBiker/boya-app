<div class="flex items-start gap-4" x-data="{state : $wire.entangle('searchState')}">
    <div class="flex-1 grid gap-4">
        <div class="flex flex-wrap gap-3">
            <div class="my-container min-w-44 grid gap-2">
                <p class="text-xl font-bold">
                    <span>{{\App\Models\Order::count()}} ədəd</span>
                    |
                    <span>{{round(\App\Models\Order::sum("total"),2)}} AZN</span>
                </p>
                <p class="text-sm font-light">Bütün sifarişlər</p>
            </div>
            <div class="my-container min-w-44 grid gap-2">
                <p class="text-xl font-bold">
                    <span>{{\App\Models\Order::query()->where("debt",">",0)->count()}} ədəd</span>
                    |
                    <span>{{round(\App\Models\Order::sum("debt"),2)}} AZN</span>
                </p>
                <p class="text-sm font-light">Borc olan</p>
            </div>
            <div class="my-container min-w-44 grid gap-2">
                <p class="text-xl font-bold">
                    <span>{{\App\Models\Order::query()->where("status_id",4)->count()}} ədəd</span>
                    |
                    <span>{{round(\App\Models\Order::query()->where("status_id",4)->sum("total"),2)}} AZN</span>
                </p>
                <p class="text-sm font-light">Ləğv edilən</p>
            </div>
            <div class="my-container min-w-44 grid gap-2">
                <p class="text-xl font-bold">
                    <span>{{\App\Models\Order::query()->where("status_id",1)->count()}} ədəd</span>
                    |
                    <span>{{round(\App\Models\Order::query()->where("status_id",1)->sum("total"),2)}} AZN</span>
                </p>
                <p class="text-sm font-light">Hazırlanır</p>
            </div>
            <div class="my-container min-w-44 grid gap-2">
                <p class="text-xl font-bold">
                    <span>{{\App\Models\Order::query()->where("status_id",2)->count()}} ədəd</span>
                    |
                    <span>{{round(\App\Models\Order::query()->where("status_id",2)->sum("total"),2)}} AZN</span>
                </p>
                <p class="text-sm font-light">Anbarda</p>
            </div>
            <div class="my-container min-w-44 grid gap-2">
                <p class="text-xl font-bold">
                    <span>{{\App\Models\Order::query()->where("status_id",3)->count()}} ədəd</span>
                    |
                    <span>{{round(\App\Models\Order::query()->where("status_id",3)->sum("total"),2)}} AZN</span>
                </p>
                <p class="text-sm font-light">Təhvil verilib</p>
            </div>
        </div>
        <div class="my-container flex gap-8">
            <div class="inline-flex gap-1.5 items-center">
                <div class="text-sm font-medium">Sıralama</div>
                <select class="border text-sm border-black p-2" wire:model.live="orderBy">
                    @foreach($sortings as $key=>$sorting)
                        <option value="{{$key}}">{{$sorting}}</option>
                    @endforeach
                </select>
            </div>
            <div x-transition x-show="!state" class="inline-flex items-center gap-1.5">
                <input type="text" class="my-input !p-2.5 text-sm" placeholder="Sifariş kodu" wire:model.live="filters.pid">
                <button wire:click="$toggle('searchState')" class="underline text-sm">Ətraflı axtarış</button>
            </div>

            <a href="{{url("order/create")}}" wire:navigate
               class="border border-black p-2.5 font-medium text-sm inline-flex items-center gap-1 ml-auto">
                <svg class="size-5"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                Yeni
                sifariş</a>
        </div>
        <div class="my-container grid gap-4">
            <div class="overflow-auto whitespace-nowrap">
                <table class="my-table">
                    <thead>
                    <th>Əməliyyatlar</th>
                    <th>Sifariş kodu</th>
                    <th>Status</th>
                    <th>Yekun</th>
                    <th>Ödənilib</th>
                    <th>Borc</th>
                    <th>Müştəri</th>
                    <th>İcraçı</th>
                    <th>Tarix</th>
                    </thead>
                    <tbody>
                    @foreach($this->orders as $order)
                        <tr>
                            <td>
                                <a href="{{url("order/details/$order->id")}}" wire:navigate
                                   class="leading-none inline-flex items-center gap-1.5 text-sm font-medium underline border border-black p-3 ">Ətraflı
                                    məlumat</a>
                            </td>
                            <td>{{$order->pid}}</td>
                            <td>{{$order->status->name}}</td>
                            <td>{{$order->total}} AZN</td>
                            <td>{{$order->paid}} AZN</td>
                            <td>{{$order->debt}} AZN</td>
                            <td>
                                <a href="{{url("user/details/$order->customer_id")}}" wire:navigate>
                                    {{$order->customer->name}}
                                </a>
                            </td>
                            <td>{{$order->executor->name}}</td>
                            <td>{{$order->created_at->format("d-m-Y h:i:s")}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            {{$this->orders->links()}}
        </div>
    </div>
    <div x-show="state" x-transition class="w-80 my-container grid gap-4 sticky top-4" wire:keydown.enter="search">
        <div class="flex justify-between items-center gap-2">
            <p class="font-semibold text-lg">Ətraflı axtarış</p>
            <button wire:click="$toggle('searchState')" class="my-input !p-1.5 text-xs ml-auto">Gizlə</button>
        </div>
        <hr class="border-2 border-black">
        <div class="grid gap-1">
            <div class="text-sm font-medium">Sifariş kodu</div>
            <input type="text" class="border border-black text-sm p-3" wire:model="filters.pid">
        </div>
        <div class="grid gap-1">
            <div class="text-sm font-medium">Müştəri</div>
            <input type="text" class="border border-black text-sm p-3" wire:model="filters.customer">
        </div>
        <div class="grid gap-1">
            <div class="text-sm font-medium">İcraçı</div>
            <input type="text" class="border border-black text-sm p-3" placeholder="Sifariş kodu" wire:model="filters.executor">
        </div>
        <div class="grid gap-1">
            <div class="text-sm font-medium">Status</div>
            <div class="grid gap-1.5">
                @foreach(\App\Models\OrderStatus::orderBy("name","asc")->get() as $status)
                    <label for="order-status-{{$status->id}}" class="my-input !p-2 text-sm cursor-pointer">
                        <input type="checkbox" id="order-status-{{$status->id}}" wire:model="filters.status" value="{{$status->id}}">
                        <span>{{$status->name}}</span>
                    </label>
                @endforeach

            </div>
        </div>
        <div class="grid gap-1">
            <div class="text-sm font-medium">Yekun məbləğ</div>
            <div class="grid grid-cols-2 gap-2">
                <input type="text" class="border border-black text-sm p-3 w-full" placeholder="Min." wire:model="filters.total.min">
                <input type="text" class="border border-black text-sm p-3 w-full" placeholder="Maks." wire:model="filters.total.max">
            </div>
        </div>
        <div class="grid gap-1">
            <div class="text-sm font-medium">Ödənilmiş məbləğ</div>
            <div class="grid grid-cols-2 gap-2">
                <input type="text" class="border border-black text-sm p-3 w-full" placeholder="Min." wire:model="filters.paid.min">
                <input type="text" class="border border-black text-sm p-3 w-full" placeholder="Maks." wire:model="filters.paid.max">
            </div>
        </div>
        <div class="grid gap-1">
            <div class="text-sm font-medium">Borc</div>
            <div class="grid grid-cols-2 gap-2">
                <input type="text" class="border border-black text-sm p-3 w-full" placeholder="Min." wire:model="filters.debt.min">
                <input type="text" class="border border-black text-sm p-3 w-full" placeholder="Maks." wire:model="filters.debt.max">
            </div>
        </div>
        <div class="grid gap-1">
            <div class="text-sm font-medium">Endirim</div>
            <div class="grid grid-cols-2 gap-2">
                <input type="text" class="border border-black text-sm p-3 w-full" placeholder="Min." wire:model="filters.discount.min">
                <input type="text" class="border border-black text-sm p-3 w-full" placeholder="Maks." wire:model="filters.discount.max">
            </div>
        </div>
        <div class="grid gap-1">
            <div class="text-sm font-medium">Tarix</div>
            <div class="grid grid-cols-2 gap-2">
                <div class="grid gap-1">
                    <input type="text" class="my-input w-full !p-2.5 text-sm" placeholder="gün-ay-il" wire:model="filters.createdAt.min" x-mask="99-99-9999">
                    <span class="text-sm">Tarixdən</span>
                </div>
                <div class="grid gap-1">
                    <input type="text" class="my-input w-full !p-2.5 text-sm" placeholder="gün-ay-il" wire:model="filters.createdAt.max" x-mask="99-99-9999">
                    <span class="text-sm">Tarixə</span>
                </div>
            </div>
        </div>
        <div class="flex items-center justify-end gap-2">
            <button type="button" wire:click="search" class="leading-none p-3 rounded border border-black">Axtar</button>
            <button type="button" wire:click="search('true')" class="leading-none p-3 rounded border border-black">Sıfırla</button>
        </div>
    </div>
</div>

<div class="flex items-start gap-4">
    <div class="flex-1 grid gap-4">
        <div class="my-container flex gap-8 justify-between">
            <div class="inline-flex gap-1.5 items-center">
                <div class="text-sm font-medium">Sıralama</div>
                <select name="" id="" class="border text-sm border-black p-2">
                    <option value="">Öncə yenilər</option>
                </select>
            </div>
            <a href="{{url("order/create")}}" wire:navigate
               class="bg-green-700 inline-flex justify-center text-white p-3 leading-none rounded font-medium">Yeni
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
                            <td>{{$order->pid()}}</td>
                            <td>{{$order->status->name}}</td>
                            <td>{{$order->total}} AZN</td>
                            <td>{{$order->paid}} AZN</td>
                            <td>{{$order->debt}} AZN</td>
                            <td>{{$order->customer->name}}</td>
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
    <div class="w-80 my-container grid gap-4 sticky top-4">
        <form action="" class="grid gap-3.5">
            <div class="grid gap-1">
                <div class="text-sm font-medium">Sifariş kodu</div>
                <input type="text" class="border border-black text-sm p-3" placeholder="Sifariş kodu" wire:model="filters.pid">
            </div>
            <div class="grid gap-1">
                <div class="text-sm font-medium">Müştəri</div>
                <input type="text" class="border border-black text-sm p-3" placeholder="Sifariş kodu" wire:model="filters.customer">
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
                    <input type="text" class="border border-black text-sm p-3 w-full" placeholder="gün-ay-il" wire:model="filters.createdAt.min">
                    <input type="text" class="border border-black text-sm p-3 w-full" placeholder="gün-ay-il" wire:model="filters.createdAt.max">
                </div>
            </div>
            <div class="flex items-center justify-end gap-2">
                <button type="button" wire:click="search" class="leading-none p-3 rounded border border-black">Axtar</button>
                <button type="button" wire:click="search('true')" class="leading-none p-3 rounded border border-black">Sıfırla</button>
            </div>
        </form>


    </div>
</div>

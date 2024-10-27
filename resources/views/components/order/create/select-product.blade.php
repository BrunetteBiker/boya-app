@props([
    "index",
    "orderItems",
    "orderItem",
    "receipts"
])
<div wire:key="{{$index}}" class="my-container grid gap-4">
    <div class="flex items-center gap-1.5">
        <div class="my-label">Məhsul</div>
        <select class="input flex-1" wire:model.live="orderItems.{{$index}}.productId"
                wire:change="selectedProduct({{$index}})">
            <option value="">Seçin</option>
            @foreach($this->products as $product)
                <option value="{{$product->id}}">{{$product->name}}</option>
            @endforeach
        </select>
        <a href="{{url("product/dashboard?create=true")}}" target="_blank" class="btn btn-outline btn-outline-primary">Yeni məhsul</a>
    </div>
    @if($orderItems[$index]["productId"] != "")
        <div class="flex items-center gap-1.5">
            <div class="my-label">Tərkib</div>
            <div class="relative grid flex-1">
                <input type="text" class="input" wire:model="orderItems.{{$index}}.receipt"
                       wire:click.outside="$set(receipts.{{$index}},[])"
                       wire:keyup="searchReceipts($event.target.value , {{$index}})">
                <div
                    class="input absolute w-full top-full mt-2 bg-white flex flex-wrap gap-2 {{count($receipts[$index]) > 0 ? "" : "hidden"}}">
                    @foreach($receipts[$index] as $i=>$receipt)
                        <label for="{{$index}}-{{$i}}-{{$receipt}}"
                               class="input inline-flex items-center gap-1.5 !p-2.5 text-sm cursor-pointer">
                            <input type="radio" id="{{$index}}-{{$i}}-{{$receipt}}"
                                   wire:model="orderItems.{{$index}}.receipt" value="{{$receipt}}"
                                   wire:click="$set('receipts.{{$index}}',[])">
                            <span>{{$receipt}}</span>
                        </label>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="flex items-start gap-1.5">
            <div class="my-label">Qeyd</div>
            <textarea name="" class="input flex-1" rows="3"
                      disabled>{{$orderItem["note"]}}</textarea>
        </div>
        <div class="grid grid-cols-3 gap-4">
            <div class="flex items-center gap-1.5">
                <div class="my-label">Miqdar</div>
                <input type="number" step="0.01" class="input flex-1"
                       wire:model.live="orderItems.{{$index}}.amount">
            </div>
            <div class="flex items-center gap-1.5">
                <div class="my-label">Qiymət</div>
                <input type="number" step="0.01" class="input flex-1"
                       wire:model.live="orderItems.{{$index}}.price">
            </div>
            <div class="flex items-center gap-1.5">
                <div class="my-label">Cəm</div>
                <input type="text" class="input flex-1" disabled
                       wire:model.live="orderItems.{{$index}}.total">
            </div>
        </div>
        <div class="flex justify-end gap-2">
            <button wire:click="addOrderItem"
                    class="btn btn-primary inline-flex items-center gap-1.5">
                <svg class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                Əlavə et
            </button>
            @if(count($orderItems) > 1)
                <button wire:click="removeOrderItem('{{$index}}')"
                        class="btn btn-danger inline-flex items-center gap-1.5">
                    <svg class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    Sil
                </button>
            @endif
        </div>
    @endif

</div>

<div class="grid gap-4" wire:keydown.escape="$toggle('customer.state')">

    @if($customer["state"])
        @include("livewire.order.create.customer-selection")
    @endif

    <div class="flex gap-4 items-start">
        <div class="flex-1 grid gap-4">
            <div class="my-container">
                <div class="flex items-center gap-1.5">
                    <div class="my-label">Müştəri</div>
                    <input type="text" class="my-input flex-1" disabled
                           value="{{$customer["data"]["name"] ?? "Seçilməmişdir"}}">
                    <button wire:click="$toggle('customer.state')" class="my-input font-medium">Seçin</button>
                </div>
            </div>
            @if(!is_null($customer["id"]))
                <div class="my-container grid gap-4">
                    <h1 class="text-xl font-bold">Müştəri məlumatları</h1>
                    <div class="flex items-center gap-1.5">
                        <div class="my-label">İstifadəçi kodu</div>
                        <input type="text" class="my-input flex-1" disabled value="{{$customer["data"]->pid}}">
                    </div>
                    <div class="flex items-center gap-1.5">
                        <div class="my-label">Ad və soyad</div>
                        <input type="text" class="my-input flex-1" disabled value="{{$customer["data"]->name}}">
                    </div>
                    <div class="flex items-center gap-1.5">
                        <div class="my-label">Əlaqə nömrəsi</div>
                        <input type="text" class="my-input flex-1" disabled value="{{$customer["data"]->phone()}}">
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="flex items-center gap-1.5">
                            <div class="my-label">Balans</div>
                            <input type="text" class="my-input flex-1" disabled value="{{$customer["data"]->balance}}">
                        </div>
                        <div class="flex items-center gap-1.5">
                            <div class="my-label">Borc</div>
                            <input type="text" class="my-input flex-1" disabled value="{{$customer["data"]->debt}}">
                        </div>
                    </div>

                </div>
                <div class="grid gap-4">
                    @foreach($orderItems as $index=>$orderItem)
                        @include("livewire.order.create.product-section")
                    @endforeach
                </div>
            @endif
        </div>
        <div class="my-container w-80 sticky top-4 grid gap-4">
            <div class="grid gap-1">
                <div class="my-label">Cəm</div>
                <input type="text" class="my-input" disabled wire:model.live="summary.total">
            </div>
            <div class="grid gap-1">
                <div class="my-label">Endirim</div>
                <input type="text" class="my-input" wire:model.live="summary.discount" wire:blur="calculate">
            </div>
            <div class="grid gap-1">
                <div class="my-label">Yekun məbləğ</div>
                <input type="text" class="my-input" disabled wire:model.live="summary.subTotal">
            </div>


            <div class="grid gap-1">
                <div class="my-label">Qeyd</div>
                <textarea class="my-input" rows="3" wire:model="summary.note"></textarea>
            </div>
            <button
                class="my-input inline-flex items-center gap-1.5 font-medium text-sm transition hover:text-green-600"
                wire:loading.class="hidden"
                wire:click="save"
            >
                <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
                </svg>
                <span class="text-center flex-1">
                    Qəbul et
                </span>
            </button>
            <p wire:loading wire:target="save" class="text-sm font-semibold animate-pulse">Sorğunuz icra olunur...</p>

        </div>
    </div>


</div>

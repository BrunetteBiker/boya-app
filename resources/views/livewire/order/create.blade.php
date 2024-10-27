<div class="grid gap-4" wire:keydown.escape="$toggle('customer.state')">

    @if($customer["state"])
        <x-order.create.select-customer :users="$this->users"/>
    @endif

    <div class="flex gap-4 items-start">
        <div class="flex-1 grid gap-4">
            <div class="my-container">
                <div class="flex items-center gap-1.5">
                    <div class="my-label">Müştəri</div>
                    <input type="text" class="input flex-1" disabled
                           value="{{$customer["data"]["name"] ?? "Seçilməmişdir"}}">
                    <button wire:click="$toggle('customer.state')" class="btn btn-primary inline-flex items-center gap-2">
                        <svg  viewBox="0 0 24 24" fill="none" stroke="currentColor"
                             stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="size-4">
                            <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                            <circle cx="8.5" cy="7" r="4"></circle>
                            <polyline points="17 11 19 13 23 9"></polyline>
                        </svg>
                        Seçin
                    </button>
                    <button wire:click="$dispatch('create-user')"
                            class="btn btn-outline btn-outline-primary inline-flex items-center gap-1.5">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                             stroke-linecap="round" stroke-linejoin="round" class="size-4">
                            <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                            <circle cx="8.5" cy="7" r="4"></circle>
                            <line x1="20" y1="8" x2="20" y2="14"></line>
                            <line x1="23" y1="11" x2="17" y2="11"></line>
                        </svg>
                        Müştəri yarat
                    </button>
                </div>
            </div>
            @if(!is_null($customer["id"]))
                <div class="my-container grid gap-4">
                    <h1 class="text-3xl text-blue-700 font-bold">Müştəri məlumatları</h1>
                    <hr class="border-2 border-zinc-100">
                    <div class="flex items-center gap-1.5">
                        <div class="my-label">İstifadəçi kodu</div>
                        <input type="text" class="input flex-1" disabled value="{{$customer["data"]->pid}}">
                    </div>
                    <div class="flex items-center gap-1.5">
                        <div class="my-label">Ad və soyad</div>
                        <input type="text" class="input flex-1" disabled value="{{$customer["data"]->name}}">
                    </div>
                    <div class="flex items-center gap-1.5">
                        <div class="my-label">Əlaqə nömrəsi</div>
                        <input type="text" class="input flex-1" disabled value="{{$customer["data"]->phone()}}">
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="flex items-center gap-1.5">
                            <div class="my-label">Balans</div>
                            <input type="text" class="input flex-1" disabled value="{{$customer["data"]->balance}}">
                        </div>
                        <div class="flex items-center gap-1.5">
                            <div class="my-label">Borc</div>
                            <input type="text" class="input flex-1" disabled value="{{$customer["data"]->debt}}">
                        </div>
                    </div>

                </div>
                <div class="grid gap-4">
                    @foreach($orderItems as $index=>$orderItem)
                        <x-order.create.select-product :index="$index" :orderItems="$orderItems" :orderItem="$orderItem" :receipts="$receipts"/>
                    @endforeach
                </div>
            @endif
        </div>
        <div class="my-container w-80 sticky top-4 grid gap-4">
            <div class="grid gap-1">
                <div class="my-label">Cəm</div>
                <input type="text" class="input" disabled wire:model.live="summary.total">
            </div>
            <div class="grid gap-1">
                <div class="my-label">Endirim</div>
                <input type="text" class="input" wire:model.live="summary.discount" wire:blur="calculate">
            </div>
            <div class="grid gap-1">
                <div class="my-label">Yekun məbləğ</div>
                <input type="text" class="input" disabled wire:model.live="summary.subTotal">
            </div>


            <div class="grid gap-1">
                <div class="my-label">Qeyd</div>
                <textarea class="input" rows="3" wire:model="summary.note"></textarea>
            </div>
            <button
                class="input inline-flex items-center gap-1.5 font-medium text-sm transition hover:text-green-600"
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

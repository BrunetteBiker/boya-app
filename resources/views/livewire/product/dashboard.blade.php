<div class="grid gap-4">
    <div class="my-container">
        <form wire:submit="create" class="flex gap-4">
            <div class="flex items-center gap-1.5 flex-1">
                <div class="text-sm font-medium">Məhsulun adı</div>
                <input type="text" class="border border-black p-3 flex-1" placeholder="Daxil edin"
                       wire:model="newProduct.name">
            </div>
            <div class="flex items-center gap-1.5">
                <div class="text-sm font-medium">Məbləğ</div>
                <input type="text" class="border border-black p-3 w-36" placeholder="Min." wire:model="newProduct.min">
                <input type="text" class="border border-black p-3 w-36" placeholder="Maks." wire:model="newProduct.max">
            </div>
            <button type="submit" class="border border-black leading-none font-medium p-3">Daxil et</button>
        </form>
    </div>
    @if($selectedId)
        <div class="fixed top-0 left-0 w-full h-dvh bg-black/70 backdrop-blur z-10 p-8 grid items-center justify-items-center">
            <form wire:submit="create" class="my-container grid gap-4 w-1/4">
                <div class="grid gap-1">
                    <div class="text-sm font-medium">Məhsulun adı</div>
                    <input type="text" class="border border-black p-3 flex-1" placeholder="Daxil edin"
                           wire:model="selectedProduct.name">
                </div>
                <div class="grid gap-1">
                    <div class="text-sm font-medium">Məbləğ</div>
                    <div class="grid grid-cols-2 gap-3">
                        <input type="text" class="border border-black p-3 w-full" placeholder="Min."
                               wire:model="selectedProduct.min">
                        <input type="text" class="border border-black p-3 w-full" placeholder="Maks."
                               wire:model="selectedProduct.max">
                    </div>

                </div>
                <div class="grid gap-1">
                    <div class="text-sm font-medium">Status</div>
                    <label for="is-visible" class="border border-black p-3">
                        <input type="checkbox" id="is-visible" wire:model.live="selectedProduct.visible"
                               value="{{$selectedProduct["visible"]}}">
                        <span>Aktiv</span>
                    </label>
                </div>
                <div class="flex gap-2 justify-end">
                    <button wire:click="modify" type="button" class="border border-black leading-none font-medium p-3">
                        Düzəliş et
                    </button>
                    <button wire:click="$set('selectedId','')" type="button"
                            class="border border-black leading-none font-medium p-3">Gizlə
                    </button>
                </div>
            </form>
        </div>
    @endif
    <div class="flex gap-4 items-start">
        <div class="my-container grid gap-4 flex-1">
            <table class="my-table">
                <thead>
                <th>Məhsul kodu</th>
                <th>Məhsulun adı</th>
                <th>Satış qiyməti</th>
                <th>Status</th>
                </thead>
                <tbody>
                @foreach($this->products as $product)
                    <tr>
                        <td>
                            <div class="inline-flex gap-3 items-center">
                                <button wire:click="select({{$product->id}})" class="border text-black p-2 rounded-md">
                                    <svg class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                    </svg>
                                </button>
                                <p>
                                    {{$product->pid()}}
                                </p>
                            </div>

                        </td>
                        <td>{{$product->name}}</td>
                        <td>{{$product->min_price}} - {{$product->max_price}} AZN</td>
                        <td>{{$product->visible ? "Aktiv" : "Passiv"}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{$this->products->links()}}
        </div>
        <div class="my-container w-80 grid gap-4 sticky top-4">
            <div class="grid gap-1">
                <div class="text-sm font-medium">Məhsulun adı</div>
                <input type="text" class="my-input w-full" wire:model="filters.name">
            </div>
            <div class="grid gap-1">
                <div class="text-sm font-medium">Məbləğ</div>
                <div class="flex gap-3">
                    <input type="text" class="my-input w-full" placeholder="Min" wire:model="filters.min">
                    <input type="text" class="my-input w-full" placeholder="Maks" wire:model="filters.max">
                </div>

            </div>
            <div class="grid gap-1">
                <div class="text-sm font-medium">Status</div>
                <select class="my-input w-full" wire:model="filters.visible">
                    <option value="">Ümumi</option>
                    <option value="1">Aktiv</option>
                    <option value="0">Passiv</option>
                </select>

            </div>
            <div class="flex gap-3">
                <button wire:click="search" class="p-4 leading-none border border-black font-medium flex-1">Axtar
                </button>
                <button wire:click="resetSearch" class="p-4 leading-none border border-black font-medium flex-1">
                    Sıfırla
                </button>
            </div>
        </div>
    </div>

</div>

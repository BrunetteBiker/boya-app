<div class="flex items-start gap-4">
    <div class="flex-1 grid gap-4">
        <div class="my-container">
            <div class="flex gap-8">
                <div class="inline-flex gap-1.5 items-center">
                    <div class="text-sm font-medium">Sıralama</div>
                    <select name="" id="" class="border text-sm border-black p-2">
                        <option value="">Öncə yenilər</option>
                    </select>
                </div>
                <div class="inline-flex gap-1.5 items-center">
                    <div class="text-sm font-medium">Göstərilir</div>
                    <select name="" id="" class="border text-sm border-black p-2">
                        <option value="">Öncə yenilər</option>
                    </select>
                </div>
            </div>

        </div>
        <div class="my-container">
            <table class="my-table">
                <thead>
                <th>Əməliyyatlar</th>
                <th>Sifariş kodu</th>
                <th>Müştəri</th>
                <th>Status</th>
                <th>İcraçı</th>
                <th>Tarix</th>
                </thead>
            </table>
        </div>
    </div>
    <div class="w-80">
        <div class="my-container">
            <div class="grid gap-4">
                <a href="{{url("order/create")}}" wire:navigate class="bg-green-700 inline-flex justify-center text-white p-4 leading-none rounded font-medium">Yeni
                    sifariş</a>
                <form action="" class="grid gap-3.5">
                    <div class="grid gap-1">
                        <div class="text-sm font-medium">Sifariş kodu</div>
                        <input type="text" class="border border-black text-sm p-3" placeholder="Sifariş kodu">
                    </div>
                    <div class="grid gap-1">
                        <div class="text-sm font-medium">Müştəri</div>
                        <input type="text" class="border border-black text-sm p-3" placeholder="Sifariş kodu">
                    </div>
                    <div class="grid gap-1">
                        <div class="text-sm font-medium">İcraçı</div>
                        <input type="text" class="border border-black text-sm p-3" placeholder="Sifariş kodu">
                    </div>
                    <div class="grid gap-1">
                        <div class="text-sm font-medium">Status</div>
                        <input type="text" class="border border-black text-sm p-3" placeholder="Sifariş kodu">
                    </div>
                    <div class="grid gap-1">
                        <div class="text-sm font-medium">Tarix</div>
                        <div class="grid grid-cols-2 gap-2">
                            <input type="text" class="border border-black text-sm p-3 w-full" placeholder="gün-ay-il">
                            <input type="text" class="border border-black text-sm p-3 w-full" placeholder="gün-ay-il">
                        </div>
                    </div>
                    <div class="flex items-center justify-end gap-2">
                        <button class="leading-none p-3 rounded border border-black">Axtar</button>
                        <button class="leading-none p-3 rounded border border-black">Sıfırla</button>
                    </div>
                </form>
            </div>

        </div>

    </div>
</div>

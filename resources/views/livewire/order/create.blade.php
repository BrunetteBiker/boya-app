<div class="flex items-start gap-4">

    @if($customerSection)
        <div class="fixed top-0 left-0 w-full h-dvh bg-black/50 backdrop-blur p-8 z-20">
            <div class="my-container grid gap-4">
                <div class="flex justify-between items-center">
                    <h1 class="text-5xl font-bold mb-2">Müştərilər</h1>
                    <button class="underline" wire:click="$toggle('customerSection')">Geri qayıt</button>
                </div>
                <div class="flex gap-3">
                    <input type="text" class="border border-black p-3 outline-0 min-w-96" placeholder="Axtarış">
                    <a href="" class="border border-black p-3 font-medium">İstifadəçi yarat</a>
                </div>

                <hr class="border-2 border-black">
                <div class="">
                    <table class="my-table">
                        <thead>
                        <th>Əməliyyatlar</th>
                        <th>İstifadəçi kodu</th>
                        <th>Ad və soyad</th>
                        <th>Əlaqə nömrəsi</th>
                        <th>Borc</th>
                        <th>Balans</th>
                        </thead>
                        <tbody>
                        @foreach($this->customers as $customer)
                            <tr>
                                <td>
                                    <label :key="customer-{{$customer->id}}" for="customer-{{$customer->id}}"
                                           class="border border-black p-2 text-sm inline-flex items-center gap-1.5">
                                        <input type="radio" value="{{$customer->id}}" id="customer-{{$customer->id}}"
                                               wire:model.live="customerId">
                                        <span>Seç</span>
                                    </label>

                                    {{$customerId}}
                                </td>
                                <td>{{$customer->pid()}}</td>
                                <td>{{$customer->name}}</td>
                                <td>
                                    <p class="line-clamp-1 hover:line-clamp-none">
                                        {{$customer->phones->pluck("item")->implode(",")}}
                                    </p>
                                </td>
                                <td>{{$customer->debt}} AZN</td>
                                <td>{{$customer->balance}} AZN</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                {{$this->customers->links()}}
            </div>
        </div>
    @endif

    <div class="grid gap-4 flex-1">
        <div class="my-container grid gap-4">
            <div class="flex items-center gap-1.5">
                <div class="text-sm font-medium">Müştəri</div>
                <div class="relative flex-1 grid">
                    <input type="text" class="border border-black p-3" placeholder="Seçin"
                           wire:click="$toggle('customerSection')" wire:model="customer">
                </div>
            </div>

        </div>
        @if(!is_null($customerId))
            @foreach($orderItems as $index=>$orderItem)
                <div class="my-container grid gap-4">
                    <div class="flex items-center gap-1.5">
                        <div class="text-sm font-medium">Məhsul</div>
                        <select class="border border-black p-3 flex-1" wire:model.live="orderItems.{{$index}}.productId"
                                wire:change="productInfo('{{$index}}')">
                            <option value="">Seçin</option>
                            @foreach($this->products as $product)
                                <option value="{{$product->id}}">{{$product->name}}</option>
                            @endforeach
                        </select>
                        <a href="{{url('product/dashboard?create-product')}}"
                           class="border border-blue-600 text-blue-600 self-stretch p-3 inline-flex items-center">Yeni
                            məhsul</a>
                    </div>
                    <div class="flex items-center gap-1.5">
                        <div class="text-sm font-medium">Qiymət</div>
                        <input type="text" class="border border-black p-3 flex-1"
                               placeholder="{{$orderItem["recommendedInterval"]}}"
                               wire:model="orderItems.{{$index}}.price"
                               wire:keyup="calculate" {{is_null($orderItem["productId"]) ? "disabled" : ""}}>
                    </div>
                    <div class="flex items-center gap-1.5">
                        <div class="text-sm font-medium">Miqdar</div>
                        <input type="text" class="border border-black p-3 flex-1"
                               wire:model="orderItems.{{$index}}.amount"
                               wire:keyup="calculate" {{is_null($orderItem["productId"]) ? "disabled" : ""}}>
                    </div>
                    <div class="flex items-center gap-1.5">
                        <div class="text-sm font-medium">Cəm</div>
                        <input type="text" class="border border-black p-3 flex-1"
                               wire:model.live="orderItems.{{$index}}.total" disabled>
                    </div>
                    <div class="flex items-center gap-1.5">
                        <div class="text-sm font-medium">Tərkib</div>
                        <input type="text" class="border border-black p-3 flex-1"
                               wire:model="orderItems.{{$index}}.receipt" {{is_null($orderItem["productId"]) ? "disabled" : ""}}>
                    </div>
                    <div class="flex gap-3 justify-end">
                        <button wire:click="addOrderItem"
                                class="border leading-none p-3 px-4 border-black text-blue-600 font-medium text-sm">
                            Əlavə et
                        </button>
                        <button wire:click="removeOrderItem('{{$index}}')"
                                class="border leading-none p-3 px-4 border-black text-red-600 font-medium text-sm">Sil
                        </button>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
    <div class="my-container grid gap-4 w-80 sticky top-4">
        @if(!is_null($customerId))
            <div class="grid gap-1">
                <div class="text-sm font-medium">Çeşid sayı</div>
                <input type="text" class="border border-black p-3" disabled value="{{count($orderItems)}} ədəd">
            </div>
        @endif

        <div class="grid gap-1">
            <div class="text-sm font-medium">Cəm</div>
            <input type="text" class="my-input w-full" disabled value="{{$subTotal}} AZN">
        </div>
        <div class="grid gap-1">
            <div class="text-sm font-medium">Endirim</div>
            <input type="text" class="my-input w-full" wire:model="discount" wire:keyup="calculate">
        </div>
        <div class="grid gap-1">
            <div class="text-sm font-medium">Yekun</div>
            <input type="text" class="my-input w-full" disabled value="{{$final}} AZN">
        </div>
        <div class="grid gap-1">
            <div class="text-sm font-medium">Ödənilən</div>
            <input type="text" class="my-input w-full" wire:model="paid" wire:keyup="calculate">
        </div>
        <div class="grid gap-1">
            <div class="text-sm font-medium">Borc</div>
            <input type="text" class="my-input w-full" disabled value="{{$debt}} AZN">
            @if($debt < 0)
                <label for="add-to-balance" class="ml-auto text-sm inline-flex gap-1 items-center mt-2">
                    <input type="checkbox" id="add-to-balance" wire:model="addToBalance" value="1">
                    <span>Balansa köçür</span>
                </label>
            @endif
        </div>
        <div class="grid gap-1">
            <div class="text-sm font-medium">Qeyd</div>
            <textarea class="my-input w-full" rows="3" wire:model="notes"></textarea>
        </div>


        <button wire:click="save" class="bg-green-700 text-white p-4 font-medium">Təsdiqlə</button>
    </div>

</div>

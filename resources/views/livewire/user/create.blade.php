<div
    class="fixed top-0 left-0 w-full h-dvh bg-black/70 backdrop-blur grid justify-items-center p-8 items-start {{$state ? "" : "hidden"}} z-20">
    <div class="my-container w-1/3 grid gap-4">
        <h1 class="text-2xl font-bold">Yeni müştəri blankı</h1>
        <div class="flex items-center gap-1.5">
            <div class="text-sm font-medium">İcraçıdır</div>
            <select class="my-input w-full" wire:model.live="data.role">
                <option value="">Seçin</option>
                @foreach(\App\Models\UserRole::orderBy("name","asc")->get() as $role)
                    <option value="{{$role->id}}">{{$role->name}}</option>
                @endforeach
            </select>

        </div>
        <div class="flex items-center gap-1.5">
            <div class="text-sm font-medium">Ad və soyad</div>
            <input type="text" class="my-input flex-1" wire:model="data.name">
        </div>
        <div class="grid gap-1.5">
            <div class="text-sm font-medium">Əlaqə nömrəsi</div>
            <div class="grid gap-2 flex-1">
                @foreach($data["phones"] as $index=>$phone)
                    <div class="flex items-center gap-2 flex-1">
                        <input type="text" class="my-input flex-1" wire:model="data.phones.{{$index}}"
                               x-mask="099-999-99-99" placeholder="050-123-45-67">
                        <button wire:click="addPhone">
                            <svg class="size-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                 stroke-linecap="round" stroke-linejoin="round">
                                <rect x="3" y="3" width="18" height="18" rx="2" ry="2"/>
                                <line x1="12" y1="8" x2="12" y2="16"/>
                                <line x1="8" y1="12" x2="16" y2="12"/>
                            </svg>
                        </button>
                        <button wire:click="removePhone('{{$index}}')">
                            <svg class="size-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                 stroke-linecap="round" stroke-linejoin="round">
                                <rect x="3" y="3" width="18" height="18" rx="2" ry="2"/>
                                <line x1="8" y1="12" x2="16" y2="12"/>
                            </svg>
                        </button>
                    </div>
                @endforeach
            </div>

        </div>
        <div class="grid gap-2.5">
            <div class="flex items-center gap-1.5">
                <div class="text-sm font-medium">Balans</div>
                <input type="text" class="my-input flex-1" wire:model="data.balance">
            </div>
            <div class="flex items-center gap-1.5">
                <div class="text-sm font-medium">Öncədən olan borc</div>
                <input type="text" class="my-input flex-1" wire:model="data.oldDebt">
            </div>
            <div class="flex items-center gap-3">
                <div class="flex items-center gap-1.5 flex-1">
                    <div class="text-sm font-medium">Tədarükçü borcu</div>
                    <input type="number" step="0.01" class="my-input flex-1" wire:model="data.remnant">
                </div>
            </div>
        </div>


        <p wire:target="createUser" wire:loading class="text-sm font-medium animate-pulse">Sorğunuz icra olunur...</p>

        <div wire:loading.class="hidden" class="flex justify-end gap-3 text-sm font-semibold">
            <button wire:click="createUser" class="my-input inline-flex items-center gap-1.5 transition hover:font-medium hover:text-green-600">
                <svg class="size-4"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <circle cx="9" cy="7" r="4" />  <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />  <path d="M16 11h6m-3 -3v6" /></svg>
                Əlavə et
            </button>
            <button wire:click="$dispatch('create-user')" class="my-input inline-flex items-center gap-1.5 transition hover:font-medium hover:text-red-600">
                <svg class="size-4"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <circle cx="12" cy="12" r="10" />  <line x1="15" y1="9" x2="9" y2="15" />  <line x1="9" y1="9" x2="15" y2="15" /></svg>
                Ləğv et
            </button>
        </div>


    </div>
</div>

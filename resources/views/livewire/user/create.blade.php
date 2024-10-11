<div class="fixed top-0 left-0 w-full h-dvh bg-black/70 backdrop-blur grid justify-items-center p-8 items-start {{$state ? "" : "hidden"}}">
    <div class="my-container w-1/3 grid gap-4">
        <h1 class="text-2xl font-bold">Yeni müştəri blankı</h1>
        <div class="flex items-center gap-1.5">
            <div class="text-sm font-medium">İcraçıdır</div>
            <div class="flex gap-3">
                <label for="is-executor-1" class="border border-black p-3 inline-flex items-center gap-2">
                    <input type="radio" id="is-executor-1" wire:model="data.isExecutor" value="1">
                    <span>Bəli</span>
                </label>
                <label for="is-executor-0" class="border border-black p-3 inline-flex items-center gap-2">
                    <input type="radio" id="is-executor-0" wire:model="data.isExecutor" value="0">
                    <span>Xeyr</span>
                </label>
            </div>

        </div>
        <div class="flex items-center gap-1.5">
            <div class="text-sm font-medium">Ad və soyad</div>
            <input type="text" class="border border-black p-3 flex-1" wire:model="data.name">
        </div>
        <div class="grid gap-1.5">
            <div class="text-sm font-medium">Əlaqə nömrəsi</div>
            <div class="grid gap-2 flex-1">
                @foreach($data["phones"] as $index=>$phone)
                    <div class="flex items-center gap-2 flex-1">
                        <input type="text" class="border border-black p-3 flex-1" wire:model="data.phones.{{$index}}" x-mask="099-999-99-99">
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
        <div class="grid grid-cols-2 gap-4">
            <div class="flex items-center gap-1.5">
                <div class="text-sm font-medium">Balans</div>
                <input type="text" class="border border-black p-3 flex-1" wire:model="data.balance">
            </div>
            <div class="flex items-center gap-1.5">
                <div class="text-sm font-medium">Borc</div>
                <input type="text" class="border border-black p-3 flex-1" wire:model="data.debt">
            </div>
        </div>

        <div class="flex justify-end gap-3">
            <button wire:click="createUser" class="border border-black p-3 font-medium">Əlavə et</button>
            <button wire:click="$dispatch('create-user')" class="border border-black p-3 font-medium">Ləğv et</button>
        </div>


    </div>
</div>

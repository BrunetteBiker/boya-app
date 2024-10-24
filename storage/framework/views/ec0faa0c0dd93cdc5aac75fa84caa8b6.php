<div
    class="fixed top-0 left-0 w-full h-dvh bg-black/70 backdrop-blur grid justify-items-center content-start p-8 z-20">
    <div class="my-container grid gap-4 w-1/3">
        <h1 class="text-3xl font-bold text-blue-700">Yeni məhsul blankı</h1>
        <hr class="border-2 border-zinc-100">
        <div class="grid gap-1">
            <div class="my-label">Məhsulun adı</div>
            <input type="text" class="input" placeholder="Daxil edin"
                   wire:model="newProduct.name">
        </div>
        <div class="grid gap-1">
            <div class="my-label">Qeyd</div>
            <textarea class="input" rows="3" wire:model="newProduct.note" placeholder="Məhsul haqqında qeydlərinizi buraya qeyd edin..."></textarea>
        </div>
        <div class="grid gap-1">
            <div class="my-label">Status</div>
            <select class="input" wire:model="newProduct.visible">
                <option value="1">Satışdadır</option>
                <option value="0">Satışda deyil</option>
            </select>
        </div>
        <div class="flex justify-end gap-2">
            <button wire:click="create" type="submit"
                    class="btn btn-large btn-primary">
                <svg class="size-6"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <path d="M14 3v4a1 1 0 0 0 1 1h4" />  <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" />  <line x1="12" y1="11" x2="12" y2="17" />  <line x1="9" y1="14" x2="15" y2="14" /></svg>
                Yadda saxla
            </button>
            <button wire:click="$toggle('newProduct.state')" type="submit"
                    class="btn btn-large btn-disabled !cursor-pointer">
                <svg class="size-6"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <circle cx="12" cy="12" r="9" />  <path d="M10 10l4 4m0 -4l-4 4" /></svg>
                Ləğv et
            </button>
        </div>
    </div>
</div>
<?php /**PATH C:\laragon\www\boya-app\resources\views/livewire/product/create.blade.php ENDPATH**/ ?>
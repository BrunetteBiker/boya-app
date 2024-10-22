<div
    class="fixed top-0 left-0 w-full h-dvh bg-black/70 backdrop-blur z-20 p-8 grid items-center justify-items-center">
    <form wire:submit="create" class="my-container grid gap-4 w-1/4">
        <div class="grid gap-1">
            <div class="text-sm font-medium">Məhsulun adı</div>
            <input type="text" class="my-input" placeholder="Daxil edin"
                   wire:model="selectedProduct.name">
        </div>
        <div class="grid gap-1">
            <div class="text-sm font-medium">Qeyd</div>
            <textarea class="my-input" rows="3" wire:model="selectedProduct.note"></textarea>
        </div>
        <div class="grid gap-1">
            <div class="text-sm font-medium">Status</div>
            <select class="my-input" wire:model="selectedProduct.visible">
                <option value="1">Aktiv</option>
                <option value="0">Deaktiv</option>
            </select>
        </div>
        <div class="flex gap-2 justify-end">
            <button wire:click="modify" type="button" class="my-input !p-2.5 text-sm transition font-medium hover:text-orange-600 inline-flex items-center gap-1.5">
                <svg class="size-6" <svg  width="24"  height="24"  viewBox="0 0 24 24"  xmlns="http://www.w3.org/2000/svg"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <path d="M12 20h9" />  <path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z" /></svg>
                Düzəliş et
            </button>
            <button wire:click="$set('selectedId','')" type="button"
                    class="my-input !p-2.5 text-sm transition font-medium hover:text-gray-600 inline-flex items-center gap-1.5">
                <svg class="size-6"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"/>
                </svg>
                Gizlə
            </button>
        </div>
    </form>
</div>

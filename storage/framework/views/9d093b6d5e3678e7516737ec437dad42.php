<div x-data="{state : $wire.entangle('state')}" x-transition x-show="state"
    class="fixed top-0 left-0 w-full h-dvh bg-black/70 backdrop-blur z-20 p-8 grid items-center justify-items-center">
    <form wire:submit="edit" class="my-container grid gap-4 w-1/4">
        <div class="flex items-center justify-between gap-4 text-blue-700">
            <h1 class="text-3xl font-bold">Məhsul məlumatları</h1>
            <button wire:click="$set('state',false)">
                <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </button>
        </div>

        <div class="grid gap-1">
            <div class="text-sm font-medium">Məhsulun adı</div>
            <input type="text" class="input" placeholder="Daxil edin"
                   wire:model="data.name">
        </div>
        <div class="grid gap-1">
            <div class="text-sm font-medium">Qeyd</div>
            <textarea class="input" rows="3" wire:model="data.note"></textarea>
        </div>
        <div class="grid gap-1">
            <div class="text-sm font-medium">Status</div>
            <select class="input" wire:model="data.visible">
                <option value="1">Aktiv</option>
                <option value="0">Deaktiv</option>
            </select>
        </div>
        <button wire:loading.class="!hidden" wire:target="edit" type="submit" class="btn btn-primary inline-flex justify-center items-center gap-1.5">
            <svg class="size-6"  viewBox="0 0 24 24"  xmlns="http://www.w3.org/2000/svg"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <path d="M12 20h9" />  <path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z" /></svg>
            Düzəliş et
        </button>

        <p wire:loading wire:target="edit" class="loading-text">Sorğunuz icra olunur...</p>
    </form>
</div>
<?php /**PATH C:\laragon\www\boya-app\resources\views/livewire/product/edit.blade.php ENDPATH**/ ?>
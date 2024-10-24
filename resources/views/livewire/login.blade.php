<div class="grid items-center justify-items-center h-dvh">
    <div class="my-container w-1/3 grid gap-3">
        <h1 class="text-3xl font-bold mb-3 text-blue-700">Portala giriş</h1>
        <hr class="border-2 border-zinc-100">
        <div class="flex gap-1.5">
            <select class="input input-large flex-1" wire:model="executorId">
                <option value="">İcraçını seçin</option>
                @foreach($this->executors as $executor)
                    <option value="{{$executor->id}}">{{$executor->name}}</option>
                @endforeach
            </select>
            <button wire:click="login" class="btn btn-success">Daxil ol</button>
        </div>

        <p wire:loading wire:target="login" class="loading-text">Sorğunuz icra olunur...</p>


    </div>
</div>

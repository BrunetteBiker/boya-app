<div class="grid items-center justify-items-center h-dvh">
    <div class="my-container w-1/3 grid gap-3">
        <h1 class="text-3xl font-bold mb-3">Portala giriş</h1>
        <div class="flex items-center gap-1.5">
            <div class="text-sm font-medium">İcraçı</div>
            <select name="" id="" class="border p-3 border-black flex-1" wire:model="executorId">
                <option value="">Seçin</option>
                @foreach($this->executors as $executor)
                    <option value="{{$executor->id}}">{{$executor->name}}</option>
                @endforeach
            </select>
            <button wire:click="login" class="self-stretch px-5 bg-green-600 text-white font-medium">Daxil ol</button>
        </div>

        @if($errorMsg != "")
            <div class="bg-red-600 text-white leading-none p-4 rounded-md">
                {{$errorMsg}}
            </div>
        @endif

    </div>
</div>

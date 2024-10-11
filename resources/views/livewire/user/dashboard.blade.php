<div class="grid gap-4">

    <div class="my-container flex gap-3 justify-end">
        <a href="" class="font-medium underline">Axtarış</a>
        <button wire:click="$dispatch('create-user')" class="font-medium underline">Yeni istifadəçi</button>
    </div>
    <div class="flex gap-4 items-start">
        <div class="my-container flex-1 grid gap-4">
            <table class="my-table">
                <thead>
                <th>Əməliyyatlar</th>
                <th>İstifadəçi kodu</th>
                <th>Ad və soyad</th>
                <th>Əlaqə nömrəsi</th>
                <th>Vəzifə</th>
                <th>Qeydiyyat tarixi</th>
                </thead>
                <tbody>
                @foreach($this->users as $user)
                    <tr>
                        <td>
                            <button class="whitespace-nowrap inline-flex gap-2 items-center border border-black p-2.5 text-sm">
                                <svg class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                </svg>
                                Düzəliş et
                            </button>
                        </td>
                        <td>{{$user->pid()}}</td>
                        <td>{{$user->name}}</td>
                        <td>
                            <p class="line-clamp-1 hover:line-clamp-none">
                                {{$user->phones->pluck("item")->implode(",")}}
                            </p>
                        </td>
                        <td>{{$user->is_executor}}</td>
                        <td>{{$user->created_at->format("d-m-Y h:i")}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            {{$this->users->links()}}
        </div>
        <div class="my-container w-80">
            filters
        </div>
    </div>


</div>
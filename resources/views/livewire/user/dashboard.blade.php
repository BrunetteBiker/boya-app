<div class="grid gap-4">

    <div class="my-container flex gap-4">
        <button wire:click="$dispatch('create-user')"
                class="my-input font-semibold !p-2 text-sm inline-flex items-center gap-1 mr-auto">
            <svg class="size-4" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                 fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z"/>
                <circle cx="9" cy="7" r="4"/>
                <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"/>
                <path d="M16 11h6m-3 -3v6"/>
            </svg>
            Yeni istifadəçi
        </button>
        <div class="flex items-center gap-1.5">
            <div class="my-label">Sıralama</div>
            <select class="my-input w-44 !p-2 text-sm" wire:model.live="currentSorting">
                @foreach($sortings as $key=>$sorting)
                    <option value="{{$key}}">{{$sorting}}</option>
                @endforeach
            </select>
        </div>
        <button wire:click="$toggle('searchState')"
                class="my-input font-semibold !p-2 text-sm inline-flex items-center gap-1">
            <svg class="size-4" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                 fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z"/>
                <circle cx="10" cy="10" r="7"/>
                <line x1="21" y1="21" x2="15" y2="15"/>
            </svg>
            @if($searchState)
                Gizlə
            @else
                Axtarış
            @endif
        </button>
    </div>
    <div class="flex gap-4 items-start">
        <div class="my-container flex-1 grid gap-4">
            <div class="overflow-auto whitespace-nowrap">
                <table class="my-table">
                    <thead>
                    <th>Əməliyyatlar</th>
                    <th>İstifadəçi kodu</th>
                    <th>Ad və soyad</th>
                    <th>Əlaqə nömrəsi</th>
                    <th>Balans</th>
                    <th>Borc</th>
                    <th>Kəsir</th>
                    <th>Vəzifə</th>
                    <th>Qeydiyyat tarixi</th>
                    </thead>
                    <tbody>
                    @foreach($this->users as $user)
                        <tr>
                            <td>
                                <a href="{{url("user/details/$user->id")}}"
                                   wire:navigate
                                   class="my-input !p-2.5 text-sm inline-flex items-center gap-1 font-medium group transition hover:text-blue-600">
                                    <svg class="size-5 hidden group-hover:inline-block" fill="none" viewBox="0 0 24 24"
                                         stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                    </svg>
                                    Düzəliş et
                                </a>
                            </td>
                            <td>{{$user->pid()}}</td>
                            <td>
                                <p>
                                    {{$user->name}}
                                    @if(auth()->id() == $user->id)
                                        <br>
                                        <span
                                            class="inline-block text-xs bg-green-600 text-white p-1 rounded-md font-medium">Hazırki icraçı</span>
                                    @endif
                                </p>
                            </td>
                            <td class="whitespace-normal">
                                <p class="line-clamp-1 hover:line-clamp-none w-80">
                                    {{$user->phones->pluck("item")->implode(",")}}
                                </p>
                            </td>
                            <td>{{$user->balance}} AZN</td>
                            <td>{{$user->debt}} AZN</td>
                            <td>{{$user->remnant}} AZN</td>
                            <td>{{$user->role->name}}</td>
                            <td>{{$user->created_at->format("d-m-Y h:i")}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            {{$this->users->links()}}
        </div>
        @if($searchState)
            <div wire:transition class="my-container w-80 grid gap-3">
                <div class="grid gap-1">
                    <div class="my-label">İstifadəçi kodu</div>
                    <input type="text" class="my-input !p-2.5 w-full" wire:model="filters.pid">
                </div>
                <div class="grid gap-1">
                    <div class="my-label">Ad və soyad</div>
                    <input type="text" class="my-input !p-2.5 w-full" wire:model="filters.name">
                </div>
                <div class="grid gap-1">
                    <div class="my-label">Əlaqə nömrəsi</div>
                    <input type="text" class="my-input !p-2.5 w-full" wire:model="filters.phone" x-mask="099-999-99-99">
                </div>
                <div class="grid gap-1">
                    <div class="my-label">Vəzifə</div>
                    <div class="grid gap-2">
                        @foreach(\App\Models\UserRole::orderBy("name","asc")->get() as $role)
                            <label for="role-{{$role->id}}"
                                   class="my-input inline-flex items-center gap-1.5 !p-2.5 text-sm cursor-pointer w-full">
                                <input type="checkbox" id="role-{{$role->id}}" value="{{$role->id}}"
                                       wire:model="filters.roles">
                                <span>{{$role->name}}</span>
                            </label>
                        @endforeach
                    </div>
                </div>
                <div class="grid gap-1">
                    <div class="my-label">Balans</div>
                    <div class="grid grid-cols-2 gap-3">
                        <input type="number" step="0.01" class="my-input w-full !p-2.5" placeholder="Min."
                               wire:model="filters.balance.min">
                        <input type="number" step="0.01" class="my-input w-full !p-2.5" placeholder="Maks."
                               wire:model="filters.balance.max">
                    </div>
                </div>
                <div class="grid gap-1">
                    <div class="my-label">Borc</div>
                    <div class="grid grid-cols-2 gap-3">
                        <input type="number" step="0.01" class="my-input w-full !p-2.5" placeholder="Min."
                               wire:model="filters.debt.min">
                        <input type="number" step="0.01" class="my-input w-full !p-2.5" placeholder="Maks."
                               wire:model="filters.debt.max">
                    </div>
                </div>
                <div class="grid gap-1">
                    <div class="my-label">Kəsir</div>
                    <div class="grid grid-cols-2 gap-3">
                        <input type="number" step="0.01" class="my-input w-full !p-2.5" placeholder="Min."
                               wire:model="filters.remnant.min">
                        <input type="number" step="0.01" class="my-input w-full !p-2.5" placeholder="Maks."
                               wire:model="filters.remnant.max">
                    </div>
                </div>
                <div class="grid gap-1">
                    <div class="my-label">Qeydiyyat tarixi</div>
                    <div class="grid grid-cols-2 gap-3">
                        <div class="grid gap-1">
                            <input type="text" class="my-input !p-2.5 w-full" placeholder="gün-ay-il"
                                   x-mask="99-99-9999">
                            <span class="text-xs">Tarixdən</span>
                        </div>
                        <div class="grid gap-1">
                            <input type="text" class="my-input !p-2.5 w-full" placeholder="gün-ay-il"
                                   x-mask="99-99-9999">
                            <span class="text-xs">Tarixə</span>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-3">
                    <button wire:click="search"
                            class="my-input !p-2 inline-flex gap-1 items-center font-medium justify-between">
                        Axtar
                        <svg class="size-4" width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                             stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z"/>
                            <circle cx="10" cy="10" r="7"/>
                            <line x1="21" y1="21" x2="15" y2="15"/>
                        </svg>
                    </button>
                    <button wire:click="search('true')"
                            class="my-input !p-2 inline-flex gap-1 items-center font-medium justify-between">
                        Sıfırla
                        <svg class="size-4" width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                             stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z"/>
                            <path d="M20 11a8.1 8.1 0 0 0 -15.5 -2m-.5 -5v5h5"/>
                            <path d="M4 13a8.1 8.1 0 0 0 15.5 2m.5 5v-5h-5"/>
                        </svg>
                    </button>
                </div>
            </div>
        @endif
    </div>


</div>

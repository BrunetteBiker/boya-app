<div class="grid gap-4" x-data="{state : $wire.entangle('searchState')}">

    <livewire:user.create/>

    <div class="my-container flex gap-4">
        <select class="input" wire:model.live="currentSorting">
            @foreach($sortings as $key=>$sorting)
                <option value="{{$key}}">{{$sorting}}</option>
            @endforeach
        </select>
        <div x-show="!state" x-transition class="flex gap-2">
            <input type="text" class="input" placeholder="Axtarış" wire:model.live="searchKeyword">
            <button wire:click="$toggle('searchState')" class="link link-primary link-small">
                Ətraflı axtarış
            </button>
        </div>
        <button wire:click="$dispatch('create-user')"
                class="btn btn-outline btn-outline-success ml-auto">
            <svg class="size-4" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                 fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z"/>
                <circle cx="9" cy="7" r="4"/>
                <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"/>
                <path d="M16 11h6m-3 -3v6"/>
            </svg>
            Yeni istifadəçi
        </button>
    </div>
    <div class="flex gap-4 items-start">
        <div class="my-container flex-1 grid gap-4">
            <div class="overflow-auto whitespace-nowrap">
                <table class="custom-table">
                    <thead>
                    <th>Əməliyyatlar</th>
                    <th>İstifadəçi kodu</th>
                    <th>Ad və soyad</th>
                    <th>Əlaqə nömrəsi</th>
                    <th>Balans</th>
                    <th>Borc</th>
                    <th>Tədarükçü borcu</th>
                    <th>Vəzifə</th>
                    <th>Qeydiyyat tarixi</th>
                    </thead>
                    <tbody>
                    @foreach($this->users as $user)
                        <tr>
                            <td>
                                <a href="{{url("user/details/$user->id")}}"
                                   wire:navigate
                                   class="btn btn-primary btn-small">
                                    <svg class="size-4" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                         fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z"/>
                                        <path d="M9 7 h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3"/>
                                        <path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3"/>
                                        <line x1="16" y1="5" x2="19" y2="8"/>
                                    </svg>
                                    Düzəliş et
                                </a>
                            </td>
                            <td>{{$user->pid}}</td>
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
        <div x-show="state" x-transition
             class="my-container w-80 grid gap-3" wire:keydown.enter="search(false)">
            <div class="flex justify-between items-center gap-2">
                <p class="font-semibold text-lg">Ətraflı axtarış</p>
                <button wire:click="$toggle('searchState')" class="input !p-1.5 text-xs ml-auto">Gizlə</button>
            </div>
            <hr class="border-2 border-black">
            <div class="grid gap-1">
                <div class="my-label">İstifadəçi kodu</div>
                <input type="text" class="input w-full" wire:model="filters.pid">
            </div>
            <div class="grid gap-1">
                <div class="my-label">Ad və soyad</div>
                <input type="text" class="input w-full" wire:model="filters.name">
            </div>
            <div class="grid gap-1">
                <div class="my-label">Əlaqə nömrəsi</div>
                <input type="text" class="input w-full" wire:model="filters.phone">
            </div>
            <div class="grid gap-1">
                <div class="my-label">Vəzifə</div>
                <div class="grid gap-2">
                    @foreach(\App\Models\UserRole::orderBy("name","asc")->get() as $role)
                        <label for="role-{{$role->id}}"
                               class="input">
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
                    <input type="number" step="0.01" class="input w-full !p-2.5" placeholder="Min."
                           wire:model="filters.balance.min">
                    <input type="number" step="0.01" class="input w-full !p-2.5" placeholder="Maks."
                           wire:model="filters.balance.max">
                </div>
            </div>
            <div class="grid gap-1">
                <div class="my-label">Ümumi borc</div>
                <div class="grid grid-cols-2 gap-3">
                    <input type="number" step="0.01" class="input w-full !p-2.5" placeholder="Min."
                           wire:model="filters.debt.min">
                    <input type="number" step="0.01" class="input w-full !p-2.5" placeholder="Maks."
                           wire:model="filters.debt.max">
                </div>
            </div>
            <div class="grid gap-1">
                <div class="my-label">Satış borcu</div>
                <div class="grid grid-cols-2 gap-3">
                    <input type="number" step="0.01" class="input w-full !p-2.5" placeholder="Min."
                           wire:model="filters.currentDebt.min">
                    <input type="number" step="0.01" class="input w-full !p-2.5" placeholder="Maks."
                           wire:model="filters.currentDebt.max">
                </div>
            </div>
            <div class="grid gap-1">
                <div class="my-label">Köhnə borc</div>
                <div class="grid grid-cols-2 gap-3">
                    <input type="number" step="0.01" class="input w-full !p-2.5" placeholder="Min."
                           wire:model="filters.oldDebt.min">
                    <input type="number" step="0.01" class="input w-full !p-2.5" placeholder="Maks."
                           wire:model="filters.oldDebt.max">
                </div>
            </div>
            <div class="grid gap-1">
                <div class="my-label">Tədarükçü borcu</div>
                <div class="grid grid-cols-2 gap-3">
                    <input type="number" step="0.01" class="input w-full !p-2.5" placeholder="Min."
                           wire:model="filters.remnant.min">
                    <input type="number" step="0.01" class="input w-full !p-2.5" placeholder="Maks."
                           wire:model="filters.remnant.max">
                </div>
            </div>
            <div class="grid gap-1">
                <div class="my-label">Qeydiyyat tarixi</div>
                <div class="grid grid-cols-2 gap-3">
                    <div class="grid gap-1">
                        <input type="text" class="input w-full" placeholder="gün-ay-il"
                               x-mask="99-99-9999" wire:model="filters.registeredAt.min">
                        <span class="text-xs">Tarixdən</span>
                    </div>
                    <div class="grid gap-1">
                        <input type="text" class="input w-full" placeholder="gün-ay-il"
                               x-mask="99-99-9999" wire:model="filters.registeredAt.max">
                        <span class="text-xs">Tarixə</span>
                    </div>
                </div>
            </div>
            <div class="flex justify-end gap-3">
                <button wire:click.prevent="search(false)"
                        class="btn btn-primary">
                    <svg class="size-4" width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                         stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z"/>
                        <circle cx="10" cy="10" r="7"/>
                        <line x1="21" y1="21" x2="15" y2="15"/>
                    </svg>
                    Axtar
                </button>
                <button wire:click.prevent="search(true)"
                        class="btn btn-disabled !cursor-pointer">
                    <svg class="size-4" width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                         stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z"/>
                        <path d="M20 11a8.1 8.1 0 0 0 -15.5 -2m-.5 -5v5h5"/>
                        <path d="M4 13a8.1 8.1 0 0 0 15.5 2m.5 5v-5h-5"/>
                    </svg>
                    Sıfırla
                </button>
            </div>
        </div>
    </div>


</div>

@props([
    "users"
])
<div
    class="fixed top-0 left-0 h-dvh overflow-auto grid p-8 justify-items-center content-start bg-black/70 backdrop-blur w-full z-30">
    <div class="my-container w-1/2 grid gap-4">

        <div class="flex justify-between items-center text-blue-700">
            <h1 class="text-3xl font-bold">Müştərilər</h1>
            <button
                wire:click="$toggle('customer.state')">
                <svg class="size-6"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </button>
        </div>
        <hr class="border-2 border-zinc-100">
        <input type="text" class="input" placeholder="Axtarış..." wire:model.live="searchUser">
        <div class="overflow-auto max-h-96 whitespace-nowrap">
            <table class="custom-table">
                <thead>
                <th>Əməliyyatlar</th>
                <th>İstifadəçi kodu</th>
                <th>Ad və soyad</th>
                <th>Əlaqə nömrəsi</th>
                <th>Vəzifə</th>
                <th>Borc</th>
                <th>Balans</th>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>
                            <div class="flex gap-2">
                                <label for="user-{{$user->id}}"
                                       class="btn btn-outline btn-outline-success inline-flex gap-1 items-center cursor-pointer">
                                    <input type="radio" value="{{$user->id}}" id="user-{{$user->id}}"
                                           wire:change="selectCustomer($event.target.value)"
                                           wire:model.live="customer.id">
                                    <span>Seç</span>
                                </label>
                                <a href="{{url("user/details/$user->id")}}"
                                   target="_blank"
                                   class="btn btn-small btn-primary inline-flex items-center gap-1">
                                    <svg class="size-5" width="24" height="24" viewBox="0 0 24 24"
                                         stroke-width="2" stroke="currentColor" fill="none"
                                         stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z"/>
                                        <circle cx="12" cy="12" r="9"/>
                                        <line x1="12" y1="8" x2="12.01" y2="8"/>
                                        <polyline points="11 12 12 12 12 16 13 16"/>
                                    </svg>
                                    <span class="text-center flex-1">Ətraflı məlumat</span>
                                </a>
                            </div>
                        </td>
                        <td>{{$user->pid}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->phone()}}</td>
                        <td>{{$user->role->name}}</td>
                        <td>{{$user->balance}} AZN</td>
                        <td>{{$user->debt}} AZN</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        {{$users->links()}}
    </div>
</div>

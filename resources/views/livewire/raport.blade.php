<div class="grid gap-4">

    <div class="my-container h-96" wire:ignore>
        <div id="chart"></div>
    </div>
    <div class="my-container h-96" wire:ignore>
        <div id="amount-chart"></div>
    </div>

    <div class="flex items-start gap-4">
        <div class="my-container w-1/3 grid gap-4">
            <div class="flex gap-3 items-end">
                <div class="grid gap-1">
                    <div class="my-label">Başlanğıc tarix</div>
                    <input type="text" class="input w-full" placeholder="gün-ay-il"
                           x-mask="99-99-9999" wire:model="countByStatusWithIntervalSearch.min">
                </div>
                <div class="grid gap-1">
                    <div class="my-label">Bitiş tarixi</div>
                    <input type="text" class="input w-full" placeholder="gün-ay-il"
                           x-mask="99-99-9999" wire:model="countByStatusWithIntervalSearch.max">
                </div>
                <button class="btn btn-outline btn-outline-primary"
                        wire:click="countByStatusWithIntervalExecute">
                    <svg class="size-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                    Axtar
                </button>
            </div>
            <hr class="border-2 border-zinc-100">
            <table class="custom-table">
                <thead>
                <th>Status</th>
                <th>Miqdar</th>
                <th>Vəsait</th>
                </thead>
                <tbody>
                @foreach($this->countByStatusWithInterval as $data)
                    <tr>
                        <td>{{$data["name"]}}</td>
                        <td>{{$data["count"]}}</td>
                        <td>{{$data["funds"]}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="flex-1 my-container grid gap-4">
            <select class="input justify-self-start" wire:model.live="selectedYear">
                @foreach(range($years["min"],$years["max"]) as $year)
                    <option value="{{$year}}">{{$year}}</option>
                @endforeach
            </select>
            <hr class="border-2 border-zinc-100">
            <div class="max-h-96 overflow-auto">
                <table class="custom-table">
                    <thead>
                    <th>Aylar</th>
                    <th>CƏM</th>
                    @foreach(\App\Models\OrderStatus::orderBy("name","asc")->get() as $os)
                        <th>{{$os->name}}</th>
                    @endforeach
                    </thead>
                    <tbody>
                    @foreach($monthes as $index=>$month)
                        <tr>
                            <td>{{$month}}</td>
                            <td>
                                <ul class="text-sm list-disc list-inside">
                                    <li>
                                        {{\App\Models\Order::query()->whereMonth("created_at",$index+1)->whereYear("created_at",$selectedYear)->count()}}
                                        ədəd
                                    </li>
                                    <li>
                                        {{round(\App\Models\Order::query()->whereMonth("created_at",$index+1)->whereYear("created_at",$selectedYear)->sum("total"),2)}}
                                        AZN
                                    </li>
                                </ul>
                            </td>
                            @foreach(\App\Models\OrderStatus::orderBy("name","asc")->get() as $os)
                                <td>
                                    <ul class="text-sm list-disc list-inside">
                                        <li>
                                            {{\App\Models\Order::query()->where("status_id",$os->id)->whereMonth("created_at",$index+1)->whereYear("created_at",2024)->count()}}
                                            ədəd
                                        </li>
                                        <li>
                                            {{round(\App\Models\Order::query()->where("status_id",$os->id)->whereMonth("created_at",$index+1)->whereYear("created_at",2024)->sum("total"),2)}}
                                            AZN
                                        </li>
                                    </ul>
                                </td>
                            @endforeach
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="my-container grid gap-4">
        <h1 class="text-2xl font-semibold">Tədarükçülər</h1>
        <div class="flex gap-3">
            <div class="inline-flex items-center gap-1">
                <div class="my-label">Sıralama</div>
                <select class="input" wire:model.live="suppliersFilter.orderBy">
                    @foreach($supplierSortings as $key=>$val)
                        <option value="{{$key}}">{{$val}}</option>
                    @endforeach
                </select>
            </div>
            <input type="text" class="input" placeholder="Sürətli axtarış"
                   wire:model.live="suppliersFilter.term">
        </div>
        <hr class="border-2 border-zinc-100">
        <div class="flex gap-4 items-start">
            <div class="my-container flex-1 overflow-auto max-h-96">
                <table class="custom-table">
                    <thead>
                    <th>Əməliyyatlar</th>
                    <th>İstifadəçi kodu</th>
                    <th>Ad və soyad</th>
                    <th>Məbləğ</th>
                    </thead>
                    <tbody>
                    @foreach($this->suppliers as $supplier)
                        <tr>
                            <td>
                                <a href=""
                                   class="btn btn-outline btn-small"
                                >
                                    <svg class="size-6" width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                         stroke="currentColor" fill="none" stroke-linecap="round"
                                         stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z"/>
                                        <circle cx="12" cy="12" r="9"/>
                                        <line x1="12" y1="8" x2="12.01" y2="8"/>
                                        <polyline points="11 12 12 12 12 16 13 16"/>
                                    </svg>
                                    Ətraflı məlumatlar
                                </a>
                            </td>
                            <td>{{$supplier->pid}}</td>
                            <td>{{$supplier->name}}</td>
                            <td>{{$supplier->remnant}} AZN</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="my-container grid gap-4 w-80">
                <div class="grid gap-1">
                    <div class="my-label">İstifadəçi kodu</div>
                    <input type="text" class="input w-full" wire:model="suppliersFilter.pid">
                </div>
                <div class="grid gap-1">
                    <div class="my-label">İstifadəçi kodu</div>
                    <input type="text" class="input w-full" wire:model="suppliersFilter.name">
                </div>
                <div class="grid gap-1">
                    <div class="my-label">Borc</div>
                    <div class="grid grid-cols-2 gap-3">
                        <input type="text" class="input w-full" wire:model="suppliersFilter.remnant.min"
                               placeholder="Min.">
                        <input type="text" class="input w-full" wire:model="suppliersFilter.remnant.max"
                               placeholder="Maks.">
                    </div>
                </div>
                <div wire:loading.class="hidden" class="flex gap-2 justify-end">
                    <button wire:click="searchSupplier"
                            class="btn btn-primary">
                        <svg class="size-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                        Axtar
                    </button>
                    <button wire:click="searchSupplier('true')"
                            class="btn btn-disabled !cursor-pointer">
                        <svg class="4" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                             fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z"/>
                            <path
                                d="M19 19h-11l-4 -4a1 1 0 0 1 0 -1.41l10 -10a1 1 0 0 1 1.41 0l5 5a1 1 0 0 1 0 1.41l-9 9"/>
                            <path d="M18 12.3l-6.3 -6.3"/>
                        </svg>
                        Sıfırla
                    </button>
                </div>
                <p wire:loading wire:target="searchSupplier" class="loading-text">Sorğunuz icra
                    olunur...</p>
            </div>
        </div>
    </div>

    @script
    <script>
        document.addEventListener("livewire:initialized", function () {
            let quantityChart = @json($quantityChart);
            let options = {
                title: {
                    text: "İllik say hesabatı qrafiki",
                    style: {
                        fontSize: "24px"
                    }
                },
                chart: {
                    type: 'bar',
                    height: 350,
                    zoom: {
                        enabled: true
                    },

                },
                series: quantityChart.series,
                xaxis: {
                    categories: quantityChart.categories,
                    tickPlacement: 'on'

                },
                yaxis: {
                    labels: {
                        formatter: function (val) {
                            return val + " ədəd";
                        }
                    }
                }

            };
            let chart1 = new ApexCharts(document.querySelector("#chart"), options);
            chart1.render();

            let fundsChart = @json($fundsChart);
            options = {
                title: {
                    text: "İllik vəsait hesabatı qrafiki",
                    style: {
                        fontSize: "24px"
                    }
                },
                chart: {
                    zoom: {
                        enabled: true
                    },
                    type: 'bar',
                    height: 350,
                },
                series: fundsChart.series,
                xaxis: {
                    categories: fundsChart.categories,
                    tickPlacement: 'on'
                },
                yaxis: {
                    labels: {
                        formatter: function (val) {
                            return val + " AZN";
                        }
                    }
                }
            };
            let chart2 = new ApexCharts(document.querySelector("#amount-chart"), options);
            chart2.render();
        })
    </script>
    @endscript

</div>

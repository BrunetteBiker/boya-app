<div class="grid gap-4">

    <div class="my-container h-96" wire:ignore>
        <div id="chart"></div>
    </div>
    <div class="my-container h-96" wire:ignore>
        <div id="amount-chart"></div>
    </div>

    <div class="my-container">
        <table class="my-table">
            <thead>
            <th>CƏM</th>
            @foreach(\App\Models\OrderStatus::orderBy("name","asc")->get() as $os)
                <th>{{$os->name}}</th>
            @endforeach
            </thead>
            <tbody>
            <tr>
                <td>{{\App\Models\Order::count()}} ədəd | {{round(\App\Models\Order::sum("total"),2)}} AZN</td>
                @foreach(\App\Models\OrderStatus::orderBy("name","asc")->get() as $os)
                    <td>{{\App\Models\Order::where("status_id",$os->id)->count()}} ədəd
                        | {{round(\App\Models\Order::where("status_id",$os->id)->sum("total"),2)}} AZN
                    </td>
                @endforeach
            </tr>
            </tbody>
        </table>
    </div>
    <div class="my-container grid gap-4">
        <select class="my-input" wire:model.live="selectedYear">
            @foreach($years as $year)
                <option value="{{$year}}">{{$year}}</option>
            @endforeach
        </select>
        <hr class="border-2 border-black">
        <div class="max-h-96 overflow-auto">
            <table class="my-table">
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
    <div class="my-container">
        <h1 class="text-2xl font-semibold">Tədarükçülər</h1>
        <div class="overflow-auto max-h-96">
            <table class="my-table">
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
                                class="my-input !p-2 text-sm font-semibold inline-flex items-center gap-2 transition hover:text-blue-700"
                            >
                                <svg class="size-6"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <circle cx="12" cy="12" r="9" />  <line x1="12" y1="8" x2="12.01" y2="8" />  <polyline points="11 12 12 12 12 16 13 16" /></svg>
                                Ətraflı məlumatlar
                            </a>
                        </td>
                        <td>{{$supplier->pid()}}</td>
                        <td>{{$supplier->name}}</td>
                        <td>{{$supplier->remnant}} AZN</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
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

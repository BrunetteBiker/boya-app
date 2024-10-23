<table>
    <tbody>
    <tr>
        <td>№</td>
        <td>Sifariş kodu</td>
        <td>Müştəri</td>
        <td>İcraçı</td>
        <td>Cəm</td>
        <td>Ödənilib</td>
        <td>Borc</td>
        <td>Status</td>
        <td>Tarix</td>
    </tr>
    @foreach($orders as $key=>$order)
        <tr>
            <td>{{$key + 1}}</td>
            <td>{{$order->pid}}</td>
            <td>{{$order->customer->name}}</td>
            <td>{{$order->executor->name}}</td>
            <td>{{$order->total}} AZN</td>
            <td>{{$order->paid}} AZN</td>
            <td>{{$order->debt}} AZN</td>
            <td>{{$order->status->name}}</td>
            <td>{{$order->created_at->format("d-m-Y h:i")}}</td>
        </tr>
    @endforeach
    </tbody>
</table>

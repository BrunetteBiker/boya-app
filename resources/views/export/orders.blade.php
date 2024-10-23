<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<table>
    <thead>
    <th>№</th>
    <th>Sifariş kodu</th>
    <th>Müştəri</th>
    <th>İcraçı</th>
    <th>Cəm</th>
    <th>Ödənilib</th>
    <th>Borc</th>
    <th>Status</th>
    <th>Tarix</th>
    </thead>
    <tbody>
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

</body>
</html>

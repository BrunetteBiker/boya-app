<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        *{
            font-size: 12pt;
        }

        body {
            font-family: "DejaVu sans", sans-serif;
        }
        table{
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            font-weight: bold;
            text-align: center;
            border: 1px black solid;
            padding: 10pt;
        }

        .page-break {
            page-break-after: always;
        }


        #order-data tr td:last-of-type {
            width: 70%;
        }

        #order-data tr td:first-of-type {
            width: 30%;
        }

        #items {
            width: 100%;
            border-collapse: collapse;
        }

    </style>
    <title>Sifariş - {{$order->pid}}</title>
</head>
<body>
<h1>Sifariş məlumatları</h1>
<table id="order-data">
    <tbody>
    <tr>
        <td>İcraçı</td>
        <td>
            <strong>{{$order->executor->name}}</strong>
        </td>
    </tr>
    <tr>
        <td>Sifariş kodu</td>
        <td>
            <strong>{{$order->pid}}</strong>
        </td>
    </tr>
    <tr>
        <td>Qeydiyyat tarixi</td>
        <td>
            <strong>{{$order->created_at->format("d-m-Y h:i:s")}}</strong>
        </td>
    </tr>
    <tr>
        <td>Ümumi cəm</td>
        <td>
            <strong>{{$order->amount}} AZN</strong>
        </td>
    </tr>
    <tr>
        <td>Endirim</td>
        <td>
            <strong>{{$order->discount}} AZN</strong>
        </td>
    </tr>
    <tr>
        <td>Yekun məbləğ</td>
        <td>
            <strong>{{$order->total}} AZN</strong>
        </td>
    </tr>
    <tr>
        <td>Ödənilib</td>
        <td>
            <strong>{{$order->paid}} AZN</strong>
        </td>
    </tr>
    <tr>
        <td>Borc</td>
        <td>
            <strong>{{$order->debt}} AZN</strong>
        </td>
    </tr>

    </tbody>
</table>
<br>
<hr>
<h1>Məhsullar</h1>
<table id="items">
    <thead>
    <th>Çeşid</th>
    <th>Tərkib</th>
    <th>Miqdar</th>
    <th>Qiymət</th>
    <th>Cəm</th>
    </thead>
    <tbody>
    @foreach($order->items as $item)
        <tr>
            <td>{{$item->product->name}}</td>
            <td>{{$item->receipt}}</td>
            <td>{{$item->amount}} ədəd</td>
            <td>{{$item->price}} AZN</td>
            <td>{{$item->total}} AZN</td>
        </tr>
    @endforeach
    </tbody>
</table>
@if($order->paid > 0)
    <br>
    <hr>
    <h1>Ödəniş cədvəli</h1>
    <table id="payments">
        <thead>
        <th>Ödəniş kodu</th>
        <th>Qəbul edən</th>
        <th>Məbləğ</th>
        <th>Tarix</th>
        </thead>
        <tbody>
        @foreach($order->payments as $payment)
            <tr>
                <td>{{$payment->pid}}</td>
                <td>{{$payment->executor->name}}</td>
                <td>{{$payment->amount}} AZN</td>
                <td>{{$payment->created_at->format("d-m-Y h:i:s")}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endif

</body>
</html>

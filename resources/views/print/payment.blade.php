<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ödəniş qəbzi</title>
    <style>
        * {
            font-size: 10pt;
        }

        body {
            font-family: "DejaVu sans", sans-serif;
        }
    </style>
</head>
<body>
<h1 style="
    font-size: 1.65rem;
    text-align: center;
">Ödəniş qəbzi</h1>

@if($payment->is_cancelled)
    <h2 style="font-size: 1.05rem;line-height: 1">LƏĞV EDİLİB</h2>
    <p style="border:1px black solid; padding: 0.5rem; font-size: 0.85rem; font-style: italic;"><span
            style="text-decoration: underline">Ləğv səbəbi</span
        >
        : {{$payment->explanation}}</p>
@endif

<ul style="list-style-position: outside;">
    <li>Ödəniş kodu : {{$payment->pid}}</li>
    <li>Ödəniş tarixi : {{$payment->created_at->format("d/m/Y h:i:s")}}</li>
    <li>Məbləğ : {{$payment->amount}} AZN</li>
    <li>Təsnifat : {{$payment->type->name}}</li>
    <li>Əməliyyat : {{$payment->action->name}}</li>
    <li>İcraçı : {{$payment->executor->name}}</li>
    <li>Ödəyici : {{$payment->customer->name}}</li>
    @if(!is_null($payment->order_id))
        <li>Sifariş kodu : {{$payment->order->pid}}</li>
    @endif
    <li>Çap tarixi : {{now()->format("d/m/Y h:i:s")}}</li>
</ul>
<p style="font-size: 0.85rem ; font-style: italic; border: 1px black solid; padding: 0.5rem"><span
        style="text-decoration: underline">Qeyd </span> : {{$payment->note}}</p>
</body>
</html>

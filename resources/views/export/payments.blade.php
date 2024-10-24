<table>
    <tbody>
    <tr>
        <td>№</td>
        <td>Ödəniş kodu</td>
        <td>Status</td>
        <td>Tarix</td>
        <td>Məbləğ</td>
        <td>Ödəyici</td>
        <td>İcraçı</td>
        <td>Təsnifat</td>
        <td>Əməliyyat</td>
        <td>Qeyd</td>
        <td>Ləğv edən</td>
        <td>Ləğv səbəbi</td>
    </tr>
    @foreach($payments as $key=>$payment)
        <tr>
            <td>{{$key + 1}}</td>
            <td>{{$payment->pid}}</td>
            <td>{{$payment->is_cancelled == true ? "Aktiv" : "Ləğv edilib"}}</td>
            <td>{{$payment->created_at->format("d-m-Y h:i")}}</td>
            <td>{{$payment->amount}} AZN</td>
            <td>{{$payment->customer->name}}</td>
            <td>{{$payment->executor->name}}</td>
            <td>{{$payment->type->name}}</td>
            <td>{{$payment->action->name}}</td>
            <td>{{$payment->note}}</td>
            <td>{{$payment->is_cancelled == true ? $payment->cancelledUser->name : ""}}</td>
            <td>{{$payment->explanation}}</td>
        </tr>
    @endforeach
    </tbody>
</table>

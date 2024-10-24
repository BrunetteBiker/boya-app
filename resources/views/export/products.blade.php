<table>
    <tbody>
    <tr>
        <td>№</td>
        <td>Status</td>
        <td>Məhsul kodu</td>
        <td>Məhsulun adı</td>
        <td>Qeyd</td>
        <td>Əlavə olunma tarixi</td>
        <td>Son düzəliş tarixi</td>
    </tr>
        @foreach($products as $key=>$product)
            <tr>
                <td>{{$key + 1}}</td>
                <td>{{$product->visible ? "Aktiv" : "Deaktiv"}}</td>
                <td>{{$product->pid}}</td>
                <td>{{$product->name}}</td>
                <td>{{$product->note}}</td>
                <td>{{$product->created_at->format("d-m-Y h:i:s")}}</td>
                <td>{{$product->updated_at->format("d-m-Y h:i:s")}}</td>
            </tr>
        @endforeach
    </tbody>
</table>

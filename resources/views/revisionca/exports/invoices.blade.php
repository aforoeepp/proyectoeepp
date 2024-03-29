<table>
    <thead>
    <tr>   
        <th>Id</th>  
        <th>Ruta</th>
        <th>Codigo</th>
        <th>lecturaan</th>
        <th>consumoan</th>
        <th>lecturaac</th>
        <th>consumoac</th>
        <th>promedio</th>
        <th>causadenol</th>
        <th>nombre</th>
        <th>estrato</th>
        <th>direccion</th>
        <th>nmedidor</th>
        <th>estado</th>
        <th>lecturar</th>
        <th>observacion</th>
        <th>fecha creacion</th>
        <th>fecha seguimiento</th>
    </tr>
    </thead>
    <tbody>
    @foreach($invoices as $invoice)
        <tr>   
            <td>{{ $invoice->id }}</td>        
            <td>{{ $invoice->ruta }}</td>
            <td>{{ $invoice->codigo }}</td>
            <td>{{ $invoice->lecturaan }}</td>
            <td>{{ $invoice->consumoan }}</td>
            <td>{{ $invoice->lecturaac }}</td>
            <td>{{ $invoice->consumoac }}</td>
            <td>{{ $invoice->promedio }}</td>
            <td>{{ $invoice->causadenol }}</td>
            <td>{{ $invoice->nombre }}</td>
            <td>{{ $invoice->estrato }}</td>
            <td>{{ $invoice->direccion}}</td>
            <td>{{ $invoice->nmedidor }}</td>
            <td>{{ $invoice->estado }}</td>
            <td>{{ $invoice->lecturar}}</td>
            <td>{{ $invoice->observacion}}</td>
            <td>{{ $invoice->created_at}}</td>
            <td>{{ $invoice->updated_at}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
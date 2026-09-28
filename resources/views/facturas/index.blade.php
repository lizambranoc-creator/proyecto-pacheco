<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Facturas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light p-4">
    <div class="container bg-white p-4 rounded shadow-sm">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Listado de Facturas</h2>
            <a href="{{ route('facturas.create') }}" class="btn btn-primary">+ Nueva Factura</a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th># ID</th>
                    <th>Cliente</th>
                    <th>Fecha</th>
                    <th>Productos</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @forelse($facturas as $factura)
                    <tr>
                        <td><strong>#{{ $factura->id }}</strong></td>
                        <td>{{ $factura->cliente->nombre ?? 'N/A' }}</td>
                        <td>{{ $factura->fecha }}</td>
                        <td>
                            <ul class="mb-0">
                                @foreach($factura->detalles as $detalle)
                                    <li>
                                        {{ $detalle->producto->nombre ?? 'Producto' }} 
                                        (x{{ $detalle->cantidad }}) - 
                                        ${{ number_format($detalle->subtotal, 2) }}
                                    </li>
                                @endforeach
                            </ul>
                        </td>
                        <td class="fw-bold text-success">${{ number_format($factura->total, 2) }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted">No hay facturas registradas.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</body>
</html>
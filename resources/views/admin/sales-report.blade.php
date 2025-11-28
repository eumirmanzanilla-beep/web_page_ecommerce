<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de Ventas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
            <span class="navbar-brand">Reporte de Ventas</span>
            <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-light btn-sm">Dashboard</a>
        </div>
    </nav>

    <div class="container my-5">
        <h1 class="mb-4">Reporte de Ventas</h1>

        <form method="GET" action="{{ route('admin.sales-report') }}" class="row g-3 mb-4">
            <div class="col-md-4">
                <label for="start_date" class="form-label">Fecha Inicio</label>
                <input type="date" name="start_date" class="form-control" value="{{ $startDate }}">
            </div>
            <div class="col-md-4">
                <label for="end_date" class="form-label">Fecha Fin</label>
                <input type="date" name="end_date" class="form-control" value="{{ $endDate }}">
            </div>
            <div class="col-md-4">
                <label class="form-label">&nbsp;</label>
                <button type="submit" class="btn btn-primary w-100">Filtrar</button>
            </div>
        </form>

        <div class="row mb-4">
            <div class="col-md-4">
                <div class="card text-white bg-success">
                    <div class="card-body">
                        <h5 class="card-title">Ingresos Totales</h5>
                        <h2>${{ number_format($totalRevenue, 2) }}</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-white bg-info">
                    <div class="card-body">
                        <h5 class="card-title">Total Pedidos</h5>
                        <h2>{{ $totalOrders }}</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-white bg-primary">
                    <div class="card-body">
                        <h5 class="card-title">Promedio por Pedido</h5>
                        <h2>${{ number_format($averageOrder, 2) }}</h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Productos Más Vendidos</h5>
            </div>
            <div class="card-body">
                @if($topProducts->count() > 0)
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Producto</th>
                                <th>Cantidad Vendida</th>
                                <th>Ingresos</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($topProducts as $product)
                                <tr>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->total_quantity }}</td>
                                    <td>${{ number_format($product->total_revenue, 2) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p class="text-muted">No hay datos para el período seleccionado.</p>
                @endif
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


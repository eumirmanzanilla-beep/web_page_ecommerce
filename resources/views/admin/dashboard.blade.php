<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administración</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
</head>
<body class="bg-light">
    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 h1">Panel de Administración</span>
            <div>
                <a href="{{ route('products.index') }}" class="btn btn-outline-light btn-sm me-2">Ver Catálogo</a>
                <a href="{{ route('logout') }}" class="btn btn-outline-danger btn-sm" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Salir</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </div>
    </nav>

    <div class="container my-5">
        <h1 class="mb-4">Dashboard</h1>

        <!-- Stats Cards -->
        <div class="row mb-4">
            <div class="col-md-3 mb-3">
                <div class="card text-white bg-primary">
                    <div class="card-body">
                        <h5 class="card-title">Total Pedidos</h5>
                        <h2>{{ $stats['total_orders'] }}</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="card text-white bg-warning">
                    <div class="card-body">
                        <h5 class="card-title">Pedidos Pendientes</h5>
                        <h2>{{ $stats['pending_orders'] }}</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="card text-white bg-success">
                    <div class="card-body">
                        <h5 class="card-title">Ingresos Totales</h5>
                        <h2>${{ number_format($stats['total_revenue'], 2) }}</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="card text-white bg-info">
                    <div class="card-body">
                        <h5 class="card-title">Productos</h5>
                        <h2>{{ $stats['total_products'] }}</h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-md-6 mb-3">
                <div class="card text-white bg-danger">
                    <div class="card-body">
                        <h5 class="card-title">Productos con Bajo Stock</h5>
                        <h2>{{ $stats['low_stock_products'] }}</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="card text-white bg-secondary">
                    <div class="card-body">
                        <h5 class="card-title">Total Clientes</h5>
                        <h2>{{ $stats['total_customers'] }}</h2>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Links -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Accesos Rápidos</h5>
                    </div>
                    <div class="card-body">
                        <a href="{{ route('admin.products.index') }}" class="btn btn-primary me-2">Gestionar Productos</a>
                        <a href="{{ route('admin.orders.index') }}" class="btn btn-primary me-2">Gestionar Pedidos</a>
                        <a href="{{ route('admin.categories.index') }}" class="btn btn-primary me-2">Gestionar Categorías</a>
                        <a href="{{ route('admin.sales-report') }}" class="btn btn-success me-2">Reporte de Ventas</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Orders -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Pedidos Recientes</h5>
                    </div>
                    <div class="card-body">
                        @if($recent_orders->count() > 0)
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Cliente</th>
                                        <th>Total</th>
                                        <th>Estado</th>
                                        <th>Fecha</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($recent_orders as $order)
                                        <tr>
                                            <td>#{{ $order->id }}</td>
                                            <td>{{ $order->user->username }}</td>
                                            <td>${{ number_format($order->total, 2) }}</td>
                                            <td>
                                                <span class="badge 
                                                    @if($order->status == 'completed') bg-success
                                                    @elseif($order->status == 'processing') bg-info
                                                    @elseif($order->status == 'cancelled') bg-danger
                                                    @else bg-warning
                                                    @endif">
                                                    {{ ucfirst($order->status) }}
                                                </span>
                                            </td>
                                            <td>{{ $order->created_at->format('d/m/Y H:i') }}</td>
                                            <td>
                                                <a href="{{ route('orders.show', $order) }}" class="btn btn-sm btn-outline-primary">Ver</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <p class="text-muted">No hay pedidos recientes.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


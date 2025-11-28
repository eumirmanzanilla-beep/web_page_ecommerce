<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Pedidos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
            <span class="navbar-brand">Gestión de Pedidos</span>
            <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-light btn-sm">Dashboard</a>
        </div>
    </nav>

    <div class="container my-5">
        <h1 class="mb-4">Pedidos</h1>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if($orders->count() > 0)
            <div class="card">
                <div class="card-body">
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
                            @foreach($orders as $order)
                                <tr>
                                    <td>#{{ $order->id }}</td>
                                    <td>{{ $order->user->username }}</td>
                                    <td>${{ number_format($order->total, 2) }}</td>
                                    <td>
                                        <form action="{{ route('admin.orders.update-status', $order) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('PATCH')
                                            <select name="status" class="form-select form-select-sm d-inline-block" style="width: auto;" onchange="this.form.submit()">
                                                <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pendiente</option>
                                                <option value="processing" {{ $order->status == 'processing' ? 'selected' : '' }}>En Proceso</option>
                                                <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>Completado</option>
                                                <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Cancelado</option>
                                            </select>
                                        </form>
                                    </td>
                                    <td>{{ $order->created_at->format('d/m/Y H:i') }}</td>
                                    <td>
                                        <a href="{{ route('orders.show', $order) }}" class="btn btn-sm btn-outline-primary">Ver</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="d-flex justify-content-center mt-4">
                {{ $orders->links() }}
            </div>
        @else
            <div class="alert alert-info">
                <p>No hay pedidos.</p>
            </div>
        @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


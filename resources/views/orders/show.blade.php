<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedido #{{ $order->id }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
</head>
<body class="bg-light">
    <header class="bg-white shadow-sm mb-4">
        <div class="container">
            <div class="row align-items-center py-3">
                <div class="col-12 col-sm-4">
                    <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}" style="font-weight: 700; color: #4A90E2;">
                        <img src="https://placehold.co/30x30/4A90E2/ffffff?text=L" alt="Logo" width="30" height="30" class="d-inline-block me-2 rounded-circle">
                        UCanCook
                    </a>
                </div>
                <div class="col-12 col-sm-4 text-center">
                    <a href="{{ route('orders.index') }}" class="btn btn-link text-dark">← Volver a pedidos</a>
                </div>
            </div>
        </div>
    </header>

    <main class="container my-5">
        <h1 class="mb-4">Detalle del Pedido #{{ $order->id }}</h1>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="row">
            <div class="col-md-8">
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="mb-0">Productos</h5>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Producto</th>
                                    <th>Cantidad</th>
                                    <th>Precio</th>
                                    <th>Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($order->items as $item)
                                    <tr>
                                        <td>{{ $item->product->name }}</td>
                                        <td>{{ $item->quantity }}</td>
                                        <td>${{ number_format($item->price, 2) }}</td>
                                        <td>${{ number_format($item->subtotal, 2) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Información del Pedido</h5>
                    </div>
                    <div class="card-body">
                        <p><strong>Estado:</strong> 
                            <span class="badge 
                                @if($order->status == 'completed') bg-success
                                @elseif($order->status == 'processing') bg-info
                                @elseif($order->status == 'cancelled') bg-danger
                                @else bg-warning
                                @endif">
                                {{ ucfirst($order->status) }}
                            </span>
                        </p>
                        <p><strong>Fecha:</strong> {{ $order->created_at->format('d/m/Y H:i') }}</p>
                        <p><strong>Método de pago:</strong> {{ ucfirst($order->payment_method) }}</p>
                        @if($order->shipping_address)
                            <p><strong>Dirección de envío:</strong><br>{{ $order->shipping_address }}</p>
                        @endif
                        <hr>
                        <h5 class="text-primary">Total: ${{ number_format($order->total, 2) }}</h5>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer class="bg-dark text-white py-4 mt-5">
        <div class="container text-center">
            <p class="mb-2">&copy; 2025 UCanCook. Todos los derechos reservados.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


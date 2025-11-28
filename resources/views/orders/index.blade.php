<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis Pedidos</title>
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
                    <a href="{{ route('products.index') }}" class="btn btn-link text-dark">← Volver al catálogo</a>
                </div>
                <div class="col-12 col-sm-4 text-end">
                    <a href="{{ route('cart.index') }}" class="btn btn-outline-primary me-2">🛒 Carrito</a>
                </div>
            </div>
        </div>
    </header>

    <main class="container my-5">
        <h1 class="mb-4">Historial de Pedidos</h1>

        @if($orders->count() > 0)
            <div class="row">
                @foreach($orders as $order)
                    <div class="col-12 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-md-3">
                                        <h6 class="mb-1">Pedido #{{ $order->id }}</h6>
                                        <small class="text-muted">{{ $order->created_at->format('d/m/Y H:i') }}</small>
                                    </div>
                                    <div class="col-md-3">
                                        <span class="badge 
                                            @if($order->status == 'completed') bg-success
                                            @elseif($order->status == 'processing') bg-info
                                            @elseif($order->status == 'cancelled') bg-danger
                                            @else bg-warning
                                            @endif">
                                            {{ ucfirst($order->status) }}
                                        </span>
                                    </div>
                                    <div class="col-md-3">
                                        <strong class="text-primary">${{ number_format($order->total, 2) }}</strong>
                                    </div>
                                    <div class="col-md-3 text-end">
                                        <a href="{{ route('orders.show', $order) }}" class="btn btn-sm btn-outline-primary">Ver detalles</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="d-flex justify-content-center mt-4">
                {{ $orders->links() }}
            </div>
        @else
            <div class="alert alert-info text-center">
                <h5>No tienes pedidos aún</h5>
                <p>Realiza tu primera compra desde nuestro catálogo.</p>
                <a href="{{ route('products.index') }}" class="btn btn-primary">Ver productos</a>
            </div>
        @endif
    </main>

    <footer class="bg-dark text-white py-4 mt-5">
        <div class="container text-center">
            <p class="mb-2">&copy; 2025 UCanCook. Todos los derechos reservados.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


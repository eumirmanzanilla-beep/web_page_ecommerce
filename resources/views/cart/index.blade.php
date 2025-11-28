<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de Compras - UCanCook</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        :root {
            --primary-color: #1a1a2e;
            --secondary-color: #16213e;
            --accent-color: #0f3460;
            --highlight-color: #e94560;
            --gold-color: #f5a623;
            --dark-bg: #0d1117;
            --card-bg: #161b22;
            --text-light: #c9d1d9;
        }
        
        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #0d1117 0%, #1a1a2e 50%, #16213e 100%);
            min-height: 100vh;
            color: var(--text-light);
        }
        
        header {
            background: rgba(13, 17, 23, 0.95) !important;
            backdrop-filter: blur(10px);
            box-shadow: 0 2px 20px rgba(0,0,0,0.5);
            border-bottom: 1px solid rgba(245, 166, 35, 0.2);
        }
        
        .cart-card {
            background: var(--card-bg);
            border-radius: 20px;
            padding: 2rem;
            box-shadow: 0 10px 30px rgba(0,0,0,0.5);
            margin-bottom: 2rem;
            border: 1px solid rgba(245, 166, 35, 0.1);
        }
        
        .cart-item {
            padding: 1.5rem;
            border-bottom: 1px solid rgba(245, 166, 35, 0.1);
            transition: background 0.3s ease;
        }
        
        .cart-item:hover {
            background: var(--dark-bg);
        }
        
        .cart-item:last-child {
            border-bottom: none;
        }
        
        .product-image-cart {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.3);
            border: 1px solid rgba(245, 166, 35, 0.2);
        }
        
        .summary-card {
            background: linear-gradient(135deg, var(--gold-color), #ffd700);
            color: var(--dark-bg);
            border-radius: 20px;
            padding: 2rem;
            box-shadow: 0 10px 30px rgba(245, 166, 35, 0.3);
            position: sticky;
            top: 20px;
            border: 1px solid rgba(245, 166, 35, 0.3);
        }
        
        .total-price {
            font-size: 2rem;
            font-weight: 700;
            color: var(--dark-bg);
        }
        
        .btn-primary {
            background: var(--dark-bg);
            color: var(--gold-color);
            border: 2px solid var(--gold-color);
            border-radius: 12px;
            font-weight: 600;
            padding: 0.75rem 2rem;
            transition: all 0.3s ease;
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(245, 166, 35, 0.5);
            background: var(--gold-color);
            color: var(--dark-bg);
        }
        
        .btn-danger {
            border-radius: 8px;
        }
        
        .form-control {
            border-radius: 8px;
            border: 2px solid rgba(245, 166, 35, 0.2);
            background: var(--dark-bg);
            color: var(--text-light);
        }
        
        .form-control:focus {
            border-color: var(--gold-color);
            box-shadow: 0 0 0 0.2rem rgba(245, 166, 35, 0.25);
            background: var(--dark-bg);
            color: var(--text-light);
        }
        
        .empty-cart {
            text-align: center;
            padding: 4rem 2rem;
            background: var(--card-bg);
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.5);
            border: 1px solid rgba(245, 166, 35, 0.1);
        }
        
        .empty-cart i {
            font-size: 5rem;
            color: var(--gold-color);
            margin-bottom: 1rem;
        }
        
        h1 {
            font-weight: 800;
            color: var(--text-light);
        }
        
        footer {
            background: linear-gradient(135deg, var(--dark-bg), #0a0e1a) !important;
            margin-top: 4rem;
            border-top: 1px solid rgba(245, 166, 35, 0.1);
        }
        
        .btn-link {
            color: var(--text-light);
        }
        
        .btn-link:hover {
            color: var(--gold-color);
        }
        
        .alert {
            background: var(--card-bg);
            color: var(--text-light);
            border: 1px solid rgba(245, 166, 35, 0.2);
        }
    </style>
</head>
<body>
    <header class="bg-white shadow-sm mb-4">
        <div class="container">
            <div class="row align-items-center py-3">
                <div class="col-12 col-sm-4">
                    <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}" style="font-weight: 700;">
                        <i class="bi bi-shop me-2" style="font-size: 1.8rem; color: var(--gold-color);"></i>
                        UCanCook
                    </a>
                </div>
                <div class="col-12 col-sm-4 text-center">
                    <a href="{{ route('products.index') }}" class="btn btn-link text-light">
                        <i class="bi bi-arrow-left"></i> Continuar comprando
                    </a>
                </div>
                <div class="col-12 col-sm-4 text-end">
                    <a href="{{ route('orders.index') }}" class="btn btn-outline-secondary me-2">
                        <i class="bi bi-receipt"></i> Mis Pedidos
                    </a>
                </div>
            </div>
        </div>
    </header>

    <main class="container my-5">
        <h1 class="mb-4">
            <i class="bi bi-cart3 me-2"></i>Carrito de Compras
        </h1>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="bi bi-exclamation-triangle-fill me-2"></i>{{ session('error') }}
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if($cart->items->count() > 0)
            <div class="row">
                <div class="col-md-8">
                    <div class="cart-card">
                        <h3 class="mb-4" style="color: var(--gold-color);"><i class="bi bi-bag-check me-2"></i>Productos en tu carrito</h3>
                        @foreach($cart->items as $item)
                            <div class="cart-item">
                                <div class="row align-items-center">
                                    <div class="col-md-4">
                                        <div class="d-flex align-items-center">
                                            @if($item->product->image && file_exists(public_path('storage/' . $item->product->image)))
                                                <img src="{{ asset('storage/' . $item->product->image) }}" alt="{{ $item->product->name }}" class="product-image-cart me-3">
                                            @elseif($item->product->image)
                                                <img src="{{ Storage::url($item->product->image) }}" alt="{{ $item->product->name }}" class="product-image-cart me-3">
                                            @else
                                                <div class="product-image-cart me-3 d-flex align-items-center justify-content-center bg-dark">
                                                    <i class="bi bi-egg-fried" style="font-size: 2rem; color: var(--gold-color); opacity: 0.3;"></i>
                                                </div>
                                            @endif
                                            <div>
                                                <strong style="color: var(--text-light);">{{ $item->product->name }}</strong>
                                                <br>
                                                <small class="text-muted">
                                                    <i class="bi bi-box-seam"></i> Stock: {{ $item->product->stock }}
                                                </small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2 text-center">
                                        <strong style="color: var(--gold-color);">${{ number_format($item->product->price, 2) }}</strong>
                                    </div>
                                    <div class="col-md-3">
                                        <form action="{{ route('cart.update', $item) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('PATCH')
                                            <div class="input-group">
                                                <input type="number" name="quantity" value="{{ $item->quantity }}" min="1" max="{{ $item->product->stock }}" class="form-control text-center" style="width: 80px;" onchange="this.form.submit()">
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-md-2 text-center">
                                        <strong style="color: var(--gold-color);">${{ number_format($item->subtotal, 2) }}</strong>
                                    </div>
                                    <div class="col-md-1 text-end">
                                        <form action="{{ route('cart.remove', $item) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="mt-3">
                            <form action="{{ route('cart.clear') }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger btn-sm" onclick="return confirm('¿Estás seguro de vaciar el carrito?');">
                                    <i class="bi bi-x-circle"></i> Vaciar carrito
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="summary-card">
                        <h3 class="mb-4"><i class="bi bi-receipt-cutoff me-2"></i>Resumen del pedido</h3>
                        <hr style="border-color: rgba(13, 17, 23, 0.3);">
                        <div class="d-flex justify-content-between mb-3">
                            <span>Subtotal:</span>
                            <strong>${{ number_format($cart->total, 2) }}</strong>
                        </div>
                        <hr style="border-color: rgba(13, 17, 23, 0.3);">
                        <div class="d-flex justify-content-between mb-4">
                            <span class="fs-5"><strong>Total:</strong></span>
                            <span class="total-price">${{ number_format($cart->total, 2) }}</span>
                        </div>
                        <form action="{{ route('orders.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="shipping_address" class="form-label">
                                    <i class="bi bi-geo-alt"></i> Dirección de envío (opcional)
                                </label>
                                <textarea name="shipping_address" id="shipping_address" class="form-control" rows="3" placeholder="Ingresa tu dirección de envío" style="background: rgba(255,255,255,0.9); color: var(--dark-bg);"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary w-100 btn-lg">
                                <i class="bi bi-check-circle me-2"></i>Confirmar Pedido
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @else
            <div class="empty-cart">
                <i class="bi bi-cart-x"></i>
                <h3>Tu carrito está vacío</h3>
                <p class="text-muted">Agrega productos desde nuestro catálogo.</p>
                <a href="{{ route('products.index') }}" class="btn btn-primary btn-lg mt-3">
                    <i class="bi bi-arrow-left me-2"></i>Ver productos
                </a>
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

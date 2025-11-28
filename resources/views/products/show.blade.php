<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $product->name }} - UCanCook</title>
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
        
        .product-image-container {
            background: var(--card-bg);
            border-radius: 20px;
            padding: 1rem;
            box-shadow: 0 10px 30px rgba(0,0,0,0.5);
            overflow: hidden;
            border: 1px solid rgba(245, 166, 35, 0.1);
        }
        
        .product-image {
            width: 100%;
            height: 500px;
            object-fit: cover;
            border-radius: 16px;
            transition: transform 0.3s ease;
        }
        
        .product-image:hover {
            transform: scale(1.02);
        }
        
        .product-info {
            background: var(--card-bg);
            border-radius: 20px;
            padding: 2.5rem;
            box-shadow: 0 10px 30px rgba(0,0,0,0.5);
            border: 1px solid rgba(245, 166, 35, 0.1);
        }
        
        .product-title {
            font-weight: 800;
            font-size: 2.5rem;
            color: var(--text-light);
            margin-bottom: 1rem;
        }
        
        .product-price {
            font-size: 2.5rem;
            font-weight: 700;
            background: linear-gradient(135deg, var(--gold-color), #ffd700);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin: 1.5rem 0;
        }
        
        .category-badge {
            display: inline-block;
            padding: 0.5rem 1rem;
            background: linear-gradient(135deg, var(--gold-color), #ffd700);
            color: var(--dark-bg);
            border-radius: 25px;
            font-weight: 600;
            font-size: 0.9rem;
        }
        
        .stock-badge {
            display: inline-block;
            padding: 0.5rem 1rem;
            border-radius: 25px;
            font-weight: 600;
            font-size: 0.9rem;
        }
        
        .stock-available {
            background: rgba(80, 200, 120, 0.2);
            color: #50c878;
            border: 1px solid rgba(80, 200, 120, 0.3);
        }
        
        .stock-out {
            background: rgba(233, 69, 96, 0.2);
            color: var(--highlight-color);
            border: 1px solid rgba(233, 69, 96, 0.3);
        }
        
        .btn-primary {
            background: linear-gradient(135deg, var(--gold-color), #ffd700);
            border: none;
            border-radius: 12px;
            font-weight: 600;
            padding: 0.75rem 2rem;
            color: var(--dark-bg);
            transition: all 0.3s ease;
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(245, 166, 35, 0.5);
            color: var(--dark-bg);
        }
        
        .input-group {
            border-radius: 12px;
            overflow: hidden;
        }
        
        .form-control {
            border-radius: 12px;
            border: 2px solid rgba(245, 166, 35, 0.2);
            padding: 0.75rem 1rem;
            background: var(--dark-bg);
            color: var(--text-light);
        }
        
        .form-control:focus {
            border-color: var(--gold-color);
            box-shadow: 0 0 0 0.2rem rgba(245, 166, 35, 0.25);
            background: var(--dark-bg);
            color: var(--text-light);
        }
        
        .input-group-text {
            background: var(--dark-bg);
            border: 2px solid rgba(245, 166, 35, 0.2);
            color: var(--gold-color);
        }
        
        .description-section {
            background: var(--dark-bg);
            padding: 1.5rem;
            border-radius: 12px;
            margin-top: 2rem;
            border: 1px solid rgba(245, 166, 35, 0.1);
        }
        
        footer {
            background: linear-gradient(135deg, var(--dark-bg), #0a0e1a) !important;
            margin-top: 4rem;
            border-top: 1px solid rgba(245, 166, 35, 0.1);
        }
        
        .alert {
            background: var(--card-bg);
            color: var(--text-light);
            border: 1px solid rgba(245, 166, 35, 0.2);
        }
        
        .btn-link {
            color: var(--text-light);
        }
        
        .btn-link:hover {
            color: var(--gold-color);
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
                        <i class="bi bi-arrow-left"></i> Volver al catálogo
                    </a>
                </div>
                <div class="col-12 col-sm-4 text-end">
                    @auth
                        <a href="{{ route('cart.index') }}" class="btn btn-outline-primary me-2">
                            <i class="bi bi-cart3"></i> Carrito
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </header>

    <main class="container my-5">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="row g-4">
            <div class="col-md-6">
                <div class="product-image-container">
                    @if($product->image && file_exists(public_path('storage/' . $product->image)))
                        <img src="{{ asset('storage/' . $product->image) }}" class="product-image" alt="{{ $product->name }}">
                    @elseif($product->image)
                        <img src="{{ Storage::url($product->image) }}" class="product-image" alt="{{ $product->name }}">
                    @else
                        <div class="product-image d-flex align-items-center justify-content-center bg-dark">
                            <i class="bi bi-egg-fried" style="font-size: 5rem; color: var(--gold-color); opacity: 0.3;"></i>
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-md-6">
                <div class="product-info">
                    <span class="category-badge mb-3">
                        <i class="bi bi-tag"></i> {{ $product->category->name }}
                    </span>
                    <h1 class="product-title">{{ $product->name }}</h1>
                    
                    <div class="product-price">${{ number_format($product->price, 2) }}</div>
                    
                    <div class="mb-4">
                        <span class="stock-badge {{ $product->stock > 0 ? 'stock-available' : 'stock-out' }}">
                            <i class="bi bi-box-seam"></i> 
                            @if($product->stock > 0)
                                {{ $product->stock }} unidades disponibles
                            @else
                                Sin stock
                            @endif
                        </span>
                    </div>
                    
                    @if($product->description)
                        <div class="description-section">
                            <h5 class="fw-bold mb-3" style="color: var(--gold-color);"><i class="bi bi-info-circle"></i> Descripción</h5>
                            <p class="text-muted mb-0">{{ $product->description }}</p>
                        </div>
                    @endif

                    <div class="mt-4">
                        @auth
                            @if($product->stock > 0)
                                <form action="{{ route('cart.add', $product) }}" method="POST" class="mb-4">
                                    @csrf
                                    <div class="input-group mb-3" style="max-width: 400px;">
                                        <span class="input-group-text">
                                            <i class="bi bi-123"></i> Cantidad
                                        </span>
                                        <input type="number" name="quantity" value="1" min="1" max="{{ $product->stock }}" class="form-control text-center">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="bi bi-cart-plus"></i> Agregar al carrito
                                        </button>
                                    </div>
                                </form>
                            @else
                                <button class="btn btn-secondary btn-lg w-100" disabled>
                                    <i class="bi bi-x-circle"></i> Sin stock disponible
                                </button>
                            @endif
                        @else
                            <div class="alert alert-info">
                                <i class="bi bi-info-circle me-2"></i>
                                <a href="{{ route('login') }}" class="alert-link fw-bold" style="color: var(--gold-color);">Inicia sesión</a> para agregar productos al carrito.
                            </div>
                        @endauth
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

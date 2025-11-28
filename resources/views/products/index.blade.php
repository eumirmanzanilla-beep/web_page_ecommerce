<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo de Productos - UCanCook</title>
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
        
        .navbar-brand {
            font-size: 1.5rem;
            font-weight: 700;
            background: linear-gradient(135deg, var(--gold-color), #ffd700);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        header {
            background: rgba(13, 17, 23, 0.95) !important;
            backdrop-filter: blur(10px);
            box-shadow: 0 2px 20px rgba(0,0,0,0.5);
            border-bottom: 1px solid rgba(245, 166, 35, 0.2);
        }
        
        .product-card {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            border: 1px solid rgba(245, 166, 35, 0.1);
            border-radius: 16px;
            overflow: hidden;
            background: var(--card-bg);
            box-shadow: 0 4px 6px rgba(0,0,0,0.3);
        }
        
        .product-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 24px rgba(245, 166, 35, 0.3);
            border-color: var(--gold-color);
        }
        
        .product-image {
            height: 250px;
            object-fit: cover;
            transition: transform 0.3s ease;
            background: linear-gradient(135deg, #1a1a2e 0%, #16213e 100%);
        }
        
        .product-card:hover .product-image {
            transform: scale(1.05);
        }
        
        .product-card .card-body {
            padding: 1.5rem;
            background: var(--card-bg);
        }
        
        .product-title {
            font-weight: 600;
            color: var(--text-light);
            margin-bottom: 0.5rem;
            font-size: 1.1rem;
        }
        
        .product-price {
            font-size: 1.5rem;
            font-weight: 700;
            background: linear-gradient(135deg, var(--gold-color), #ffd700);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .stock-badge {
            display: inline-block;
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
        }
        
        .stock-available {
            background: rgba(80, 200, 120, 0.2);
            color: #50c878;
            border: 1px solid rgba(80, 200, 120, 0.3);
        }
        
        .stock-low {
            background: rgba(245, 166, 35, 0.2);
            color: var(--gold-color);
            border: 1px solid rgba(245, 166, 35, 0.3);
        }
        
        .stock-out {
            background: rgba(233, 69, 96, 0.2);
            color: var(--highlight-color);
            border: 1px solid rgba(233, 69, 96, 0.3);
        }
        
        .btn-primary {
            background: linear-gradient(135deg, var(--gold-color), #ffd700);
            border: none;
            border-radius: 8px;
            font-weight: 600;
            padding: 0.5rem 1.5rem;
            color: var(--dark-bg);
            transition: all 0.3s ease;
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(245, 166, 35, 0.5);
            color: var(--dark-bg);
        }
        
        .btn-outline-primary {
            border: 2px solid var(--gold-color);
            color: var(--gold-color);
            border-radius: 8px;
            font-weight: 600;
            background: transparent;
            transition: all 0.3s ease;
        }
        
        .btn-outline-primary:hover {
            background: var(--gold-color);
            color: var(--dark-bg);
            transform: translateY(-2px);
        }
        
        .search-section {
            background: var(--card-bg);
            padding: 2rem;
            border-radius: 16px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.3);
            margin-bottom: 2rem;
            border: 1px solid rgba(245, 166, 35, 0.1);
        }
        
        .form-control, .form-select {
            border-radius: 10px;
            border: 2px solid rgba(245, 166, 35, 0.2);
            padding: 0.75rem 1rem;
            background: var(--dark-bg);
            color: var(--text-light);
            transition: all 0.3s ease;
        }
        
        .form-control:focus, .form-select:focus {
            border-color: var(--gold-color);
            box-shadow: 0 0 0 0.2rem rgba(245, 166, 35, 0.25);
            background: var(--dark-bg);
            color: var(--text-light);
        }
        
        .input-group-text {
            background: var(--dark-bg);
            border: 2px solid rgba(245, 166, 35, 0.2);
            border-right: none;
            color: var(--gold-color);
        }
        
        h1 {
            font-weight: 800;
            color: var(--text-light);
            margin-bottom: 1.5rem;
        }
        
        .page-title {
            background: linear-gradient(135deg, var(--gold-color), #ffd700);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        footer {
            background: linear-gradient(135deg, var(--dark-bg), #0a0e1a) !important;
            margin-top: 4rem;
            border-top: 1px solid rgba(245, 166, 35, 0.1);
        }
        
        .alert {
            border-radius: 12px;
            border: none;
            background: var(--card-bg);
            color: var(--text-light);
            border: 1px solid rgba(245, 166, 35, 0.2);
        }
        
        .empty-state {
            text-align: center;
            padding: 4rem 2rem;
            background: var(--card-bg);
            border-radius: 16px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.3);
            border: 1px solid rgba(245, 166, 35, 0.1);
        }
        
        .empty-state i {
            font-size: 4rem;
            color: var(--gold-color);
            margin-bottom: 1rem;
        }
        
        /* Pagination Fix */
        .pagination {
            --bs-pagination-color: var(--gold-color);
            --bs-pagination-bg: var(--card-bg);
            --bs-pagination-border-color: rgba(245, 166, 35, 0.2);
            --bs-pagination-hover-color: var(--dark-bg);
            --bs-pagination-hover-bg: var(--gold-color);
            --bs-pagination-focus-color: var(--dark-bg);
            --bs-pagination-focus-bg: var(--gold-color);
            --bs-pagination-active-color: var(--dark-bg);
            --bs-pagination-active-bg: var(--gold-color);
            --bs-pagination-disabled-color: rgba(245, 166, 35, 0.3);
            --bs-pagination-disabled-bg: var(--card-bg);
        }
        
        .pagination .page-link {
            padding: 0.5rem 0.75rem;
            font-size: 0.9rem;
            border-radius: 8px;
            margin: 0 2px;
        }
        
        .pagination .page-item:first-child .page-link,
        .pagination .page-item:last-child .page-link {
            padding: 0.5rem 0.75rem;
            font-size: 0.9rem;
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
    <!-- Header -->
    <header class="bg-white shadow-sm mb-4 sticky-top">
        <div class="container">
            <div class="row align-items-center py-3">
                <div class="col-12 col-sm-4 d-flex justify-content-center justify-content-sm-start">
                    <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
                        <i class="bi bi-shop me-2" style="font-size: 1.8rem; color: var(--gold-color);"></i>
                        UCanCook
                    </a>
                </div>
                <div class="col-12 col-sm-4 d-flex justify-content-center nav-buttons my-2 my-sm-0">
                    <a href="{{ url('/') }}" class="btn btn-link text-light text-decoration-none px-2 px-sm-3 fw-semibold">Inicio</a>
                    <a href="{{ route('services') }}" class="btn btn-link text-light text-decoration-none px-2 px-sm-3 fw-semibold">Servicios</a>
                    <a href="{{ route('products.index') }}" class="btn btn-link text-warning text-decoration-none px-2 px-sm-3 fw-bold">Productos</a>
                    <a href="{{ route('contact') }}" class="btn btn-link text-light text-decoration-none px-2 px-sm-3 fw-semibold">Contacto</a>
                </div>
                <div class="col-12 col-sm-4 text-center text-sm-end">
                    @auth
                        <span class="d-none d-sm-inline me-2 text-warning fw-semibold">Hola, {{ Auth::user()->username }}</span>
                        <a href="{{ route('cart.index') }}" class="btn btn-outline-primary me-2 rounded-pill px-3">
                            <i class="bi bi-cart3"></i> Carrito
                        </a>
                        <a href="{{ route('orders.index') }}" class="btn btn-outline-secondary me-2 rounded-pill px-3">
                            <i class="bi bi-receipt"></i> Pedidos
                        </a>
                        @if(Auth::user()->isAdmin())
                            <a href="{{ route('admin.dashboard') }}" class="btn btn-primary me-2 rounded-pill px-3">
                                <i class="bi bi-speedometer2"></i> Admin
                            </a>
                        @endif
                        <form method="POST" action="{{ route('logout') }}" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-outline-danger rounded-pill px-3">
                                <i class="bi bi-box-arrow-right"></i> Salir
                            </button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-outline-primary me-2 rounded-pill px-4">Iniciar sesión</a>
                        <a href="{{ route('register') }}" class="btn btn-primary rounded-pill px-4">Registrarme</a>
                    @endauth
                </div>
            </div>
        </div>
    </header>

    <main class="container my-5">
        <div class="row mb-4">
            <div class="col-12">
                <h1 class="page-title">
                    <i class="bi bi-grid-3x3-gap me-2"></i>Catálogo de Productos
                </h1>
                
                <!-- Search and Filter Form -->
                <div class="search-section">
                    <form method="GET" action="{{ route('products.index') }}" class="row g-3">
                        <div class="col-md-6">
                            <div class="input-group">
                                <span class="input-group-text bg-white border-end-0"><i class="bi bi-search"></i></span>
                                <input type="text" name="search" class="form-control border-start-0" placeholder="Buscar productos..." value="{{ request('search') }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="input-group">
                                <span class="input-group-text bg-white border-end-0"><i class="bi bi-funnel"></i></span>
                                <select name="category" class="form-select border-start-0">
                                    <option value="">Todas las categorías</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-primary w-100">
                                <i class="bi bi-search me-1"></i>Buscar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

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

        <!-- Products Grid -->
        @if($products->count() > 0)
            <div class="row g-4">
                @foreach($products as $product)
                    <div class="col-md-3 mb-4">
                        <div class="card product-card h-100">
                            <div class="position-relative overflow-hidden">
                                @if($product->image && file_exists(public_path('storage/' . $product->image)))
                                    <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top product-image" alt="{{ $product->name }}">
                                @elseif($product->image)
                                    <img src="{{ Storage::url($product->image) }}" class="card-img-top product-image" alt="{{ $product->name }}">
                                @else
                                    <div class="product-image d-flex align-items-center justify-content-center text-white">
                                        <i class="bi bi-egg-fried" style="font-size: 4rem; opacity: 0.3; color: var(--gold-color);"></i>
                                    </div>
                                @endif
                                @if($product->stock > 0 && $product->stock < 10)
                                    <span class="position-absolute top-0 end-0 m-2 stock-badge stock-low">
                                        <i class="bi bi-exclamation-triangle"></i> Poco stock
                                    </span>
                                @elseif($product->stock == 0)
                                    <span class="position-absolute top-0 end-0 m-2 stock-badge stock-out">
                                        <i class="bi bi-x-circle"></i> Sin stock
                                    </span>
                                @endif
                            </div>
                            <div class="card-body d-flex flex-column">
                                <h5 class="product-title">{{ $product->name }}</h5>
                                <p class="card-text text-muted small mb-3">{{ Str::limit($product->description, 80) }}</p>
                                <div class="mt-auto">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <span class="product-price">${{ number_format($product->price, 2) }}</span>
                                        <span class="stock-badge {{ $product->stock > 10 ? 'stock-available' : ($product->stock > 0 ? 'stock-low' : 'stock-out') }}">
                                            <i class="bi bi-box-seam"></i> {{ $product->stock }}
                                        </span>
                                    </div>
                                    <div class="d-grid gap-2">
                                        <a href="{{ route('products.show', $product) }}" class="btn btn-outline-primary btn-sm">
                                            <i class="bi bi-eye me-1"></i>Ver detalles
                                        </a>
                                        @auth
                                            @if($product->stock > 0)
                                                <form action="{{ route('cart.add', $product) }}" method="POST" class="mt-2">
                                                    @csrf
                                                    <div class="input-group input-group-sm">
                                                        <input type="number" name="quantity" value="1" min="1" max="{{ $product->stock }}" class="form-control text-center" style="width: 70px;">
                                                        <button type="submit" class="btn btn-primary">
                                                            <i class="bi bi-cart-plus"></i> Agregar
                                                        </button>
                                                    </div>
                                                </form>
                                            @else
                                                <button class="btn btn-secondary btn-sm w-100" disabled>
                                                    <i class="bi bi-x-circle"></i> Sin stock
                                                </button>
                                            @endif
                                        @else
                                            <a href="{{ route('login') }}" class="btn btn-outline-secondary btn-sm">
                                                <i class="bi bi-lock"></i> Inicia sesión para comprar
                                            </a>
                                        @endauth
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="d-flex justify-content-center mt-5">
                {{ $products->links() }}
            </div>
        @else
            <div class="empty-state">
                <i class="bi bi-inbox"></i>
                <h4>No se encontraron productos</h4>
                <p class="text-muted">Intenta con otros términos de búsqueda o filtros.</p>
                <a href="{{ route('products.index') }}" class="btn btn-primary mt-3">
                    <i class="bi bi-arrow-clockwise me-1"></i>Ver todos los productos
                </a>
            </div>
        @endif
    </main>

    <footer class="bg-dark text-white py-4 mt-5">
        <div class="container text-center">
            <p class="mb-2">&copy; 2025 UCanCook. Todos los derechos reservados.</p>
            <div class="d-flex justify-content-center gap-3 mt-3">
                <a href="#" class="text-warning"><i class="bi bi-facebook"></i></a>
                <a href="#" class="text-warning"><i class="bi bi-instagram"></i></a>
                <a href="#" class="text-warning"><i class="bi bi-twitter"></i></a>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UCanCook - Equipamiento Profesional para Cocinas</title>
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
        
        .carousel-item img {
            height: 500px;
            object-fit: cover;
            filter: brightness(0.7);
        }
        
        .carousel-caption {
            background: rgba(13, 17, 23, 0.8) !important;
            border-radius: 12px;
            padding: 2rem;
            border: 1px solid rgba(245, 166, 35, 0.3);
        }
        
        .carousel-caption h3 {
            color: var(--gold-color);
            font-weight: 700;
        }
        
        .offer-card {
            background: var(--card-bg);
            border-radius: 16px;
            padding: 1.5rem;
            height: 100%;
            transition: all 0.3s ease;
            border: 1px solid rgba(245, 166, 35, 0.1);
            box-shadow: 0 4px 6px rgba(0,0,0,0.3);
        }
        
        .offer-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 24px rgba(245, 166, 35, 0.3);
            border-color: var(--gold-color);
        }
        
        .offer-card-title {
            color: var(--gold-color);
            font-weight: 700;
            font-size: 1.2rem;
            margin-bottom: 1rem;
        }
        
        .offer-card-image-container {
            height: 200px;
            background: linear-gradient(135deg, var(--dark-bg), var(--card-bg));
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1rem;
            border: 1px solid rgba(245, 166, 35, 0.2);
        }
        
        .offer-card-image-container i {
            font-size: 4rem;
            color: var(--gold-color);
            opacity: 0.6;
        }
        
        .offer-card-footer {
            color: var(--gold-color);
            text-decoration: none;
            font-weight: 600;
            display: block;
            text-align: center;
            padding: 0.5rem;
            border-radius: 8px;
            transition: all 0.3s ease;
        }
        
        .offer-card-footer:hover {
            background: rgba(245, 166, 35, 0.1);
            color: #ffd700;
        }
        
        h2 {
            color: var(--text-light);
            font-weight: 800;
        }
        
        .btn-primary {
            background: linear-gradient(135deg, var(--gold-color), #ffd700);
            border: none;
            border-radius: 12px;
            font-weight: 600;
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
            background: transparent;
        }
        
        .btn-outline-primary:hover {
            background: var(--gold-color);
            color: var(--dark-bg);
        }
        
        footer {
            background: linear-gradient(135deg, var(--dark-bg), #0a0e1a) !important;
            border-top: 1px solid rgba(245, 166, 35, 0.1);
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
    <header class="main-header">
        <div class="container">
            <div class="row align-items-center py-3">
                <div class="col-12 col-sm-4 d-flex justify-content-center justify-content-sm-start header-logo">
                    <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
                        <i class="bi bi-shop me-2" style="font-size: 1.8rem; color: var(--gold-color);"></i>
                        UCanCook
                    </a>
                </div>

                <div class="col-12 col-sm-4 d-flex justify-content-center nav-buttons my-2 my-sm-0">
                    <a href="{{ url('/') }}" class="btn btn-link text-light text-decoration-none px-2 px-sm-3 fw-bold">Inicio</a>
                    <a href="{{ route('services') }}" class="btn btn-link text-light text-decoration-none px-2 px-sm-3 fw-semibold">Servicios</a>
                    <a href="{{ route('products.index') }}" class="btn btn-link text-warning text-decoration-none px-2 px-sm-3 fw-semibold">Productos</a>
                    <a href="{{ route('contact') }}" class="btn btn-link text-light text-decoration-none px-2 px-sm-3 fw-semibold">Contacto</a>
                </div>

                <div class="col-12 col-sm-4 text-center text-sm-end header-auth">
                    @auth
                        <span class="d-none d-sm-inline me-2 text-warning" style="font-weight: 600;">
                            Hola, {{ Auth::user()->username }}
                        </span>
                        <a href="{{ route('profile.edit') }}" class="btn btn-primary me-2 rounded-pill px-4" style="font-weight: 600;">
                            Perfil
                        </a>
                        <form method="POST" action="{{ route('logout') }}" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-outline-danger rounded-pill px-4" style="font-weight: 600;">
                                Salir
                            </button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-outline-primary me-2 rounded-pill px-4" style="font-weight: 600;">Iniciar sesión</a>
                        <a href="{{ route('register') }}" class="btn btn-primary rounded-pill px-4" style="font-weight: 600;">Registrarme</a>
                    @endauth
                </div>
            </div>
        </div>
    </header>

    <main>
        <!-- Carousel -->
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    @if(file_exists(public_path('images/Cocina3.avif')))
                        <img src="{{ asset('images/Cocina3.avif') }}" class="d-block w-100" alt="Cocina profesional">
                    @else
                        <div class="d-block w-100" style="height: 500px; background: linear-gradient(135deg, #1a1a2e, #16213e); display: flex; align-items: center; justify-content: center;">
                            <i class="bi bi-egg-fried" style="font-size: 8rem; color: var(--gold-color); opacity: 0.3;"></i>
                        </div>
                    @endif
                    <div class="carousel-caption d-none d-md-block">
                        <h3 style="font-weight: 700;">Bienvenido a UCanCook</h3>
                        <p>Equipamiento profesional para cocinas industriales y restaurantes.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    @if(file_exists(public_path('images/Cocina1.jpg')))
                        <img src="{{ asset('images/Cocina1.jpg') }}" class="d-block w-100" alt="Equipamiento de cocina">
                    @else
                        <div class="d-block w-100" style="height: 500px; background: linear-gradient(135deg, #1a1a2e, #16213e); display: flex; align-items: center; justify-content: center;">
                            <i class="bi bi-fire" style="font-size: 8rem; color: var(--gold-color); opacity: 0.3;"></i>
                        </div>
                    @endif
                </div>
                <div class="carousel-item">
                    @if(file_exists(public_path('images/Cocina2.jpg')))
                        <img src="{{ asset('images/Cocina2.jpg') }}" class="d-block w-100" alt="Utensilios profesionales">
                    @else
                        <div class="d-block w-100" style="height: 500px; background: linear-gradient(135deg, #1a1a2e, #16213e); display: flex; align-items: center; justify-content: center;">
                            <i class="bi bi-cup-hot" style="font-size: 8rem; color: var(--gold-color); opacity: 0.3;"></i>
                        </div>
                    @endif
                </div>
                <div class="carousel-item">
                    @if(file_exists(public_path('images/Cocina4.jpg')))
                        <img src="{{ asset('images/Cocina4.jpg') }}" class="d-block w-100" alt="Máquinas de cocina">
                    @else
                        <div class="d-block w-100" style="height: 500px; background: linear-gradient(135deg, #1a1a2e, #16213e); display: flex; align-items: center; justify-content: center;">
                            <i class="bi bi-gear-wide-connected" style="font-size: 8rem; color: var(--gold-color); opacity: 0.3;"></i>
                        </div>
                    @endif
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Anterior</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Siguiente</span>
            </button>
        </div>

        <div class="container my-5">
            <h2 class="mb-4" style="font-weight: 700;">
                <i class="bi bi-star-fill text-warning me-2"></i>Ofertas y Promociones
            </h2>

            <div class="row">
                <div class="col-12 col-sm-6 col-lg-3 mb-4">
                    <div class="offer-card">
                        <h3 class="offer-card-title">
                            <i class="bi bi-tag-fill me-2"></i>Ofertas Especiales
                        </h3>
                        <div class="offer-card-image-container">
                            <i class="bi bi-percent"></i>
                        </div>
                        <a href="{{ route('products.index') }}" class="offer-card-footer">Ver ofertas</a>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-lg-3 mb-4">
                    <div class="offer-card">
                        <h3 class="offer-card-title">
                            <i class="bi bi-credit-card me-2"></i>Meses Sin Intereses
                        </h3>
                        <div class="offer-card-image-container">
                            <i class="bi bi-calendar-check"></i>
                        </div>
                        <a href="{{ route('products.index') }}" class="offer-card-footer">Ver opciones de pago</a>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-lg-3 mb-4">
                    <div class="offer-card">
                        <h3 class="offer-card-title">
                            <i class="bi bi-truck me-2"></i>Envío Gratis
                        </h3>
                        <div class="offer-card-image-container">
                            <i class="bi bi-box-seam"></i>
                        </div>
                        <a href="{{ route('products.index') }}" class="offer-card-footer">Ver condiciones</a>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-lg-3 mb-4">
                    <div class="offer-card">
                        <h3 class="offer-card-title">
                            <i class="bi bi-house-heart me-2"></i>Equipamiento para Hogar
                        </h3>
                        <div class="offer-card-image-container">
                            <i class="bi bi-house-door"></i>
                        </div>
                        <a href="{{ route('products.index') }}" class="offer-card-footer">Ver productos</a>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer class="bg-dark text-white py-4 mt-5">
        <div class="container text-center">
            <p class="mb-2">&copy; 2025 UCanCook. Todos los derechos reservados.</p>
            <div class="d-flex justify-content-center">
                <a href="#" class="text-warning mx-3 text-decoration-none small opacity-75">Aviso de Privacidad</a>
                <a href="#" class="text-warning mx-3 text-decoration-none small opacity-75">Términos de Uso</a>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

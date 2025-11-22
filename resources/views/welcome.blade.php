<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido - Landing Page Profesional</title>
    <!-- Incluir Bootstrap 5.3 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Fuente Inter para un look moderno -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
    <!-- Enlace al archivo CSS externo -->
    <link rel="stylesheet" href="{{ asset('css/welcome-styles.css') }}">
</head>
<body class="bg-light">
    <!-- HEADER: Fijo y Estructurado en 3 Columnas -->
    <header class="main-header">
        <div class="container">
            <div class="row align-items-center py-3">
                <!-- SECCIÓN 1 (Izquierda): Título y Logo -->
                <div class="col-12 col-sm-4 d-flex justify-content-center justify-content-sm-start header-logo">
                    <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}" style="font-weight: 700; color: #4A90E2;">
                        <!-- Placeholder de Logo -->
                        <img src="https://placehold.co/30x30/4A90E2/ffffff?text=L" alt="Logo" width="30" height="30" class="d-inline-block me-2 rounded-circle">
                        Mi Proyecto
                    </a>
                </div>

                <!-- SECCIÓN 2 (Centro): 4 Botones de Navegación -->
                <div class="col-12 col-sm-4 d-flex justify-content-center nav-buttons my-2 my-sm-0">
                    <a href="{{ url('/') }}" class="btn btn-link text-dark text-decoration-none px-2 px-sm-3">Inicio</a>
                    <a href="{{ route('services') }}" class="btn btn-link text-dark text-decoration-none px-2 px-sm-3">Servicios</a>
                    <a href="{{ route('products') }}" class="btn btn-link text-dark text-decoration-none px-2 px-sm-3">Productos</a>
                    <a href="{{ route('contact') }}" class="btn btn-link text-dark text-decoration-none px-2 px-sm-3">Contacto</a>
                </div>

                <!-- SECCIÓN 3 (Derecha): Autenticación DINÁMICA -->
                <div class="col-12 col-sm-4 text-center text-sm-end header-auth">
                    @auth
                        {{-- USUARIO AUTENTICADO: Mostrar botón de perfil y logout --}}
                        <span class="d-none d-sm-inline me-2 text-primary" style="font-weight: 600;">
                            Hola, {{ Auth::user()->username }}
                        </span>
                        <a href="{{ route('profile.edit') }}" class="btn btn-primary me-2 rounded-pill px-4" style="font-weight: 600;">
                            Ir al Perfil
                        </a>
                        <!-- Botón de Logout (requiere formulario POST) -->
                        <form method="POST" action="{{ route('logout') }}" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-outline-danger rounded-pill px-4" style="font-weight: 600;">
                                Cerrar Sesión
                            </button>
                        </form>
                    @else
                        {{-- USUARIO INVITADO: Mostrar botones de Login/Registro --}}
                        <a href="{{ route('login') }}" class="btn btn-outline-primary me-2 rounded-pill px-4" style="font-weight: 600;">Iniciar sesión</a>
                        <a href="{{ route('register') }}" class="btn btn-primary rounded-pill px-4" style="font-weight: 600;">Registrarme</a>
                    @endauth
                </div>
            </div>
        </div>
    </header>

    <main>
        <!-- CARRUSEL: Full Width y Altura Controlada -->
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button> <!-- 4to indicador -->
            </div>
            <div class="carousel-inner">
                <!-- Las imágenes usan placeholders con diferentes colores -->
                <div class="carousel-item active">
                    <!-- 1200x350 es el tamaño que encaja con el max-height -->
                    <img src="{{ asset('images/Cocina3.avif') }}" class="d-block w-100" alt="Imagen de carrusel 1">
                    <div class="carousel-caption d-none d-md-block" style="background-color: rgba(0,0,0,0.5); border-radius: 8px;">
                        <h3 style="font-weight: 700;">Bienvenido a Mi Proyecto</h3>
                        <p>Descubre cómo podemos transformar tu negocio con tecnología de punta.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('images/Cocina1.jpg') }}" class="d-block w-100" alt="Imagen de carrusel 2">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('images/Cocina2.jpg') }}" class="d-block w-100" alt="Imagen de carrusel 3">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('images/Cocina4.jpg') }}" class="d-block w-100" alt="Imagen de carrusel 4">
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

        <!-- INICIO DEL COMPONENTE -->
        <div class="container my-5">

        <!-- Título de la sección -->
        <h2 class="mb-4" style="font-weight: 700;">Ofertas y promociones</h2>

        <!-- Fila que contiene las 4 tarjetas -->
        <div class="row">

            <!-- Tarjeta 1 -->
            <div class="col-12 col-sm-6 col-lg-3 mb-4">
                <div class="offer-card">
                    <h3 class="offer-card-title">Ofertas de Buen Fin</h3>
                    <div class="offer-card-image-container">
                        <img src="https://placehold.co/300x300/F0F2F5/333?text=Imagen+Oferta+1" 
                             class="offer-card-image" 
                             alt="Ofertas de Buen Fin">
                    </div>
                    <a href="#" class="offer-card-footer">Aprovecha las ofertas</a>
                </div>
            </div>

            <!-- Tarjeta 2 -->
            <div class="col-12 col-sm-6 col-lg-3 mb-4">
                <div class="offer-card">
                    <h3 class="offer-card-title">Encuentra los bancos</h3>
                    <div class="offer-card-image-container">
                        <img src="https://placehold.co/400x300/F0F2F5/333?text=Logos+de+Bancos" 
                             class="offer-card-image-grid" 
                             alt="Bancos participantes">
                    </div>
                    <a href="#" class="offer-card-footer">Ver bancos participantes</a>
                </div>
            </div>

            <!-- Tarjeta 3 -->
            <div class="col-12 col-sm-6 col-lg-3 mb-4">
                <div class="offer-card">
                    <h3 class="offer-card-title">Ahorra a meses</h3>
                    <div class="offer-card-image-container">
                        <img src="https://placehold.co/300x300/F0F2F5/333?text=MSI" 
                             class="offer-card-image" 
                             alt="Meses sin intereses">
                    </div>
                    <a href="#" class="offer-card-footer">Conoce más</a>
                </div>
            </div>

            <!-- Tarjeta 4 -->
            <div class="col-12 col-sm-6 col-lg-3 mb-4">
                <div class="offer-card">
                    <h3 class="offer-card-title">Ofertas para Hogar</h3>
                    <div class="offer-card-image-container">
                        <img src="https://placehold.co/300x300/F0F2F5/333?text=Imagen+Hogar" 
                             class="offer-card-image" 
                             alt="Ofertas Hogar y Cocina">
                    </div>
                    <a href="#" class="offer-card-footer">Ver todas las ofertas</a>
                </div>
            </div>

        </div> <!-- Fin de .row -->

        </div>
    </main>

    <footer class="bg-dark text-white py-4 mt-5">
        <div class="container text-center">
            <p class="mb-2">&copy; 2025 Mi Proyecto. Todos los derechos reservados.</p>
            <div class="d-flex justify-content-center">
                <a href="#" class="text-white mx-3 text-decoration-none small opacity-75">Aviso de Privacidad</a>
                <a href="#" class="text-white mx-3 text-decoration-none small opacity-75">Términos de Uso</a>
            </div>
        </div>
    </footer>

    <!-- Script de Bootstrap 5.3 (MANDATORIO al final del body) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto - Mi Proyecto</title>
    <!-- Incluir Bootstrap 5.3 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Fuente Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
       
    <!-- CSS específico para esta página de Contacto -->
    <link rel="stylesheet" href="{{ asset('css/contact-page-styles.css') }}">
</head>
<body class="bg-light">

    <!-- HEADER: Copiado de welcome/products para consistencia -->
    <header class="main-header">
        <div class="container">
            <div class="row align-items-center py-3">
                
                <!-- SECCIÓN 1 (Izquierda): Título y Logo -->
                <div class="col-12 col-sm-4 d-flex justify-content-center justify-content-sm-start header-logo">
                    <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}" style="font-weight: 700; color: #4A90E2;">
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
                        {{-- USUARIO AUTENTICADO --}}
                        <span class="d-none d-sm-inline me-2 text-primary" style="font-weight: 600;">
                            Hola, {{ Auth::user()->username }}
                        </span>
                        <a href="{{ route('profile.edit') }}" class="btn btn-primary me-2 rounded-pill px-4" style="font-weight: 600;">
                            Ir al Perfil
                        </a>
                        <form method="POST" action="{{ route('logout') }}" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-outline-danger rounded-pill px-4" style="font-weight: 600;">
                                Cerrar Sesión
                            </button>
                        </form>
                    @else
                        {{-- USUARIO INVITADO --}}
                        <a href="{{ route('login') }}" class="btn btn-outline-primary me-2 rounded-pill px-4" style="font-weight: 600;">Iniciar sesión</a>
                        <a href="{{ route('register') }}" class="btn btn-primary rounded-pill px-4" style="font-weight: 600;">Registrarme</a>
                    @endauth
                </div>
            </div>
        </div>
    </header>

    <main class="container my-5">
        <div class="text-center mb-5">
            <h1 class="display-4 fw-bold" style="color: #343a40;">Ponte en Contacto</h1>
            <p class="lead text-muted">Estamos aquí para ayudarte con tus proyectos de cocina.</p>
        </div>

        <!-- Tarjeta de Contacto Principal -->
        <div class="card contact-card shadow-lg border-0">
            <div class="row g-0">
                
                <!-- Columna de la Imagen -->
                <div class="col-lg-5 d-none d-lg-block">
                    <!-- Imagen de placeholder genérica -->
                    <img src="https://placehold.co/600x800/6c757d/ffffff?text=Nuestra+Oficina" class="card-img-left" alt="Oficina de contacto">
                </div>

                <!-- Columna de la Información -->
                <div class="col-lg-7">
                    <div class="card-body p-4 p-md-5">
                        
                        <h2 class="fw-bold text-primary mb-3">Mi Proyecto Cocinas</h2>
                        <p class="card-text text-muted mb-4">
                            Somos líderes en el diseño e implementación de cocinas industriales. Contáctanos para una cotización o visita nuestro showroom.
                        </p>

                        <hr class="my-4">

                        <ul class="list-unstyled contact-info-list">
                            <li class="mb-3">
                                <strong class="d-block text-dark">Nombre (Atención):</strong>
                                <span>Ana Sofía Gutiérrez (Ventas)</span>
                            </li>
                            <li class="mb-3">
                                <strong class="d-block text-dark">Dirección:</strong>
                                <span>Av. Cocineros #123, Col. Industrial, C.P. 97000, Mérida, Yucatán, México.</span>
                            </li>
                            <li class="mb-3">
                                <strong class="d-block text-dark">Teléfono:</strong>
                                <span>+52 55 1234 5678</span>
                            </li>
                        </ul>

                        <hr class="my-4">

                        <h5 class="fw-semibold mb-3">Síguenos en Redes</h5>
                        <ul class="list-unstyled">
                            <!-- Facebook -->
                            <li class="mb-2">
                                <a href="#" class="d-flex align-items-center text-decoration-none social-link">
                                    <img src="https://placehold.co/24x24/3b5998/ffffff?text=F" class="social-icon me-2" alt="Facebook">
                                    <span class="text-dark">Mi Proyecto Cocinas</span>
                                </a>
                            </li>
                            <!-- Instagram -->
                            <li class="mb-2">
                                <a href="#" class="d-flex align-items-center text-decoration-none social-link">
                                    <img src="https://placehold.co/24x24/E1306C/ffffff?text=I" class="social-icon me-2" alt="Instagram">
                                    <span class="text-dark">@MiProyectoCocinas</span>
                                </a>
                            </li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- FOOTER: Copiado de welcome/products para consistencia -->
    <footer class="bg-dark text-white py-4 mt-5">
        <div class="container text-center">
            <p class="mb-2">&copy; 2025 Mi Proyecto. Todos los derechos reservados.</p>
            <div class="d-flex justify-content-center">
                <a href="#" class="text-white mx-3 text-decoration-none small opacity-75">Aviso de Privacidad</a>
                <a href="#" class="text-white mx-3 text-decoration-none small opacity-75">Términos de Uso</a>
            </div>
        </div>
    </footer>

    <!-- Script de Bootstrap 5.3 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Servicios - UCanCook</title>
    <!-- Incluir Bootstrap 5.3 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Fuente Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">

    <!-- CSS específico para esta página de Servicios -->
    <link rel="stylesheet" href="{{ asset('css/services-page-styles.css') }}">
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
                        UCanCook
                    </a>
                </div>

                <!-- SECCIÓN 2 (Centro): 4 Botones de Navegación -->
                <div class="col-12 col-sm-4 d-flex justify-content-center nav-buttons my-2 my-sm-0">
                    <a href="{{ url('/') }}" class="btn btn-link text-dark text-decoration-none px-2 px-sm-3">Inicio</a>
                    <a href="{{ route('services') }}" class="btn btn-link text-dark text-decoration-none px-2 px-sm-3">Servicios</a>
                    <a href="{{ route('products.index') }}" class="btn btn-link text-dark text-decoration-none px-2 px-sm-3">Productos</a>
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
            <h1 class="display-4 fw-bold" style="color: #343a40;">Nuestros Servicios</h1>
            <p class="lead text-muted">Soluciones integrales para tu cocina industrial, de principio a fin.</p>
        </div>

        <div class="row g-4">
            
            <!-- Card 1: Instalación -->
            <div class="col-lg-4">
                <div class="card service-card h-100 shadow-sm">
                    <img src="https://placehold.co/600x350/4A90E2/ffffff?text=Instalación" class="card-img-top" alt="Instalación de equipo">
                    <div class="card-body d-flex flex-column">
                        <h3 class="card-title fw-semibold text-primary">Instalación</h3>
                        <p class="card-text text-muted">Instalamos todo tu equipo de cocina industrial. Nos aseguramos de que cada estufa, freidora y sistema de ventilación funcione perfectamente desde el primer día.</p>
                        <div class="mt-auto">
                            <a href="#" class="btn btn-outline-primary rounded-pill px-4">Obtener Detalles</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 2: Planificación -->
            <div class="col-lg-4">
                <div class="card service-card h-100 shadow-sm">
                    <img src="https://placehold.co/600x350/28a745/ffffff?text=Planificación" class="card-img-top" alt="Planificación de cocina">
                    <div class="card-body d-flex flex-column">
                        <h3 class="card-title fw-semibold text-success">Planificación</h3>
                        <p class="card-text text-muted">Diseñamos el boceto de tu cocina para maximizar la eficiencia, el flujo de trabajo y cumplir con todas las normativas de sanidad. Creamos el plano perfecto para tu espacio.</p>
                        <div class="mt-auto">
                            <a href="#" class="btn btn-outline-success rounded-pill px-4">Obtener Detalles</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 3: Construcción -->
            <div class="col-lg-4">
                <div class="card service-card h-100 shadow-sm">
                    <img src="https://placehold.co/600x350/ffc107/333333?text=Construcción" class="card-img-top" alt="Construcción de cocina">
                    <div class="card-body d-flex flex-column">
                        <h3 class="card-title fw-semibold text-warning">Construcción</h3>
                        <p class="card-text text-muted">Realizamos la obra civil necesaria para adaptar tu local. Desde plomería especializada y conexiones de gas hasta la instalación de acero inoxidable en muros y pisos.</p>
                        <div class="mt-auto">
                            <a href="#" class="btn btn-outline-warning rounded-pill px-4">Obtener Detalles</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>

    <!-- FOOTER: Copiado de welcome/products para consistencia -->
    <footer class="bg-dark text-white py-4 mt-5">
        <div class="container text-center">
            <p class="mb-2">&copy; 2025 UCanCook. Todos los derechos reservados.</p>
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
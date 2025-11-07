<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos - Mi Proyecto</title>
    <!-- Incluir Bootstrap 5.3 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Fuente Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
    <!-- Estilos personalizados para los carruseles -->
     <link rel="stylesheet" href="{{ asset('css/product-page-styles.css') }}">
</head>
<body class="bg-light">

    <!-- HEADER: Copiado de welcome.blade.php para consistencia -->
    <header class="main-header">
        <div class="container">
            <div class="row align-items-center py-3">
                
                <!-- SECCIÓN 1 (Izquierda): Título y Logo -->
                <div class="col-12 col-sm-4 d-flex justify-content-center justify-content-sm-start header-logo">
                    <a class="navbar-brand d-flex align-items-center" href="{{  url('/') }}" style="font-weight: 700; color: #4A90E2;">
                        <img src="https://placehold.co/30x30/4A90E2/ffffff?text=L" alt="Logo" width="30" height="30" class="d-inline-block me-2 rounded-circle">
                        Mi Proyecto
                    </a>
                </div>

                <!-- SECCIÓN 2 (Centro): 4 Botones de Navegación -->
                <div class="col-12 col-sm-4 d-flex justify-content-center nav-buttons my-2 my-sm-0">
                    <a href="{{ url('/') }}" class="btn btn-link text-dark text-decoration-none px-2 px-sm-3">Inicio</a>
                    <a href="{{ route('construccion') }}" class="btn btn-link text-dark text-decoration-none px-2 px-sm-3">Servicios</a>
                    <a href="{{ route('products') }}" class="btn btn-link text-primary text-decoration-none px-2 px-sm-3">Productos</a>
                    <a href="{{ route('construccion') }}" class="btn btn-link text-dark text-decoration-none px-2 px-sm-3">Contacto</a>
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

        <!-- 1. UTENSILIOS -->
        <section class="mb-5">
            <h2 class="mb-4 section-header">Utensilios</h2>
            <p class="text-muted">Cucharones, tenedores, cuchillos, y más.</p>
            <div id="carouselUtensilios" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="row">
                            <!-- Tarjeta Genérica 1 -->
                            <div class="col-md-3">
                                <div class="card">
                                    <img src="https://placehold.co/600x400/E0E0E0/909090?text=Cucharón" class="card-img-top" alt="Producto">
                                    <div class="card-body">
                                        <h5 class="card-title">Cucharón de Acero</h5>
                                        <p class="card-text">Ideal para sopas y guisos.</p>
                                        <a href="#" class="btn btn-outline-primary rounded-pill">Ver detalle</a>
                                    </div>
                                </div>
                            </div>
                            <!-- Tarjeta Genérica 2 -->
                            <div class="col-md-3">
                                <div class="card">
                                    <img src="https://placehold.co/600x400/E0E0E0/909090?text=Cuchillo" class="card-img-top" alt="Producto">
                                    <div class="card-body">
                                        <h5 class="card-title">Cuchillo de Chef</h5>
                                        <p class="card-text">Corte preciso, 8 pulgadas.</p>
                                        <a href="#" class="btn btn-outline-primary rounded-pill">Ver detalle</a>
                                    </div>
                                </div>
                            </div>
                            <!-- Tarjeta Genérica 3 (puedes agregar más) -->
                            <div class="col-md-3">
                                <div class="card">
                                    <img src="https://placehold.co/600x400/E0E0E0/909090?text=Espátula" class="card-img-top" alt="Producto">
                                    <div class="card-body">
                                        <h5 class="card-title">Espátula de Goma</h5>
                                        <p class="card-text">Resistente al calor.</p>
                                        <a href="#" class="btn btn-outline-primary rounded-pill">Ver detalle</a>
                                    </div>
                                </div>
                            </div>
                            <!-- Tarjeta Genérica 4 -->
                            <div class="col-md-3">
                                <div class="card">
                                    <img src="https://placehold.co/600x400/E0E0E0/909090?text=Tenedor" class="card-img-top" alt="Producto">
                                    <div class="card-body">
                                        <h5 class="card-title">Juego de Tenedores</h5>
                                        <p class="card-text">Acero inoxidable (12 pzs).</p>
                                        <a href="#" class="btn btn-outline-primary rounded-pill">Ver detalle</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Puedes agregar más carousel-item para más productos -->
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselUtensilios" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselUtensilios" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </section>

        <!-- 2. EQUIPO DE COCINA -->
        <section class="mb-5">
            <h2 class="mb-4 section-header">Equipo de Cocina</h2>
            <p class="text-muted">Estufas integradas, freidoras, planchas, etc.</p>
            <div id="carouselEquipo" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="card">
                                    <img src="https://placehold.co/600x400/D5DBDB/909090?text=Estufa" class="card-img-top" alt="Producto">
                                    <div class="card-body">
                                        <h5 class="card-title">Estufa Industrial</h5>
                                        <p class="card-text">6 quemadores y horno.</p>
                                        <a href="#" class="btn btn-outline-primary rounded-pill">Ver detalle</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card">
                                    <img src="https://placehold.co/600x400/D5DBDB/909090?text=Freidora" class="card-img-top" alt="Producto">
                                    <div class="card-body">
                                        <h5 class="card-title">Freidora de Aire</h5>
                                        <p class="card-text">Industrial, 20L.</p>
                                        <a href="#" class="btn btn-outline-primary rounded-pill">Ver detalle</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card">
                                    <img src="https://placehold.co/600x400/D5DBDB/909090?text=Plancha" class="card-img-top" alt="Producto">
                                    <div class="card-body">
                                        <h5 class="card-title">Plancha de Acero</h5>
                                        <p class="card-text">Superficie antiadherente.</p>
                                        <a href="#" class="btn btn-outline-primary rounded-pill">Ver detalle</a>
                                    </div>
                                </div>
                            </div>
                             <div class="col-md-3">
                                <div class="card">
                                    <img src="https://placehold.co/600x400/D5DBDB/909090?text=Horno" class="card-img-top" alt="Producto">
                                    <div class="card-body">
                                        <h5 class="card-title">Horno de Convección</h5>
                                        <p class="card-text">Cocción pareja.</p>
                                        <a href="#" class="btn btn-outline-primary rounded-pill">Ver detalle</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselEquipo" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselEquipo" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                </button>
            </div>
        </section>

        <!-- 3. TRASTES -->
        <section class="mb-5">
            <h2 class="mb-4 section-header">Trastes</h2>
            <p class="text-muted">Bowls de aluminio, charolas, platos, etc.</p>
             <div id="carouselTrastes" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="card">
                                    <img src="https://placehold.co/600x400/BDC3C7/909090?text=Bowls" class="card-img-top" alt="Producto">
                                    <div class="card-body">
                                        <h5 class="card-title">Juego de Bowls</h5>
                                        <p class="card-text">Aluminio reforzado.</p>
                                        <a href="#" class="btn btn-outline-primary rounded-pill">Ver detalle</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card">
                                    <img src="https://placehold.co/600x400/BDC3C7/909090?text=Charolas" class="card-img-top" alt="Producto">
                                    <div class="card-body">
                                        <h5 class="card-title">Charolas para Hornear</h5>
                                        <p class="card-text">Set de 3 tamaños.</p>
                                        <a href="#" class="btn btn-outline-primary rounded-pill">Ver detalle</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselTrastes" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselTrastes" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                </button>
            </div>
        </section>

        <!-- 4. MÁQUINAS PEQUEÑAS -->
        <section class="mb-5">
            <h2 class="mb-4 section-header">Máquinas Pequeñas</h2>
            <p class="text-muted">Licuadoras, batidoras, microondas, etc.</p>
            <div id="carouselMaquinas" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="card">
                                    <img src="https://placehold.co/600x400/AAB7B8/909090?text=Licuadora" class="card-img-top" alt="Producto">
                                    <div class="card-body">
                                        <h5 class="card-title">Licuadora Industrial</h5>
                                        <p class="card-text">Alta potencia (3HP).</p>
                                        <a href="#" class="btn btn-outline-primary rounded-pill">Ver detalle</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card">
                                    <img src="https://placehold.co/600x400/AAB7B8/909090?text=Batidora" class="card-img-top" alt="Producto">
                                    <div class="card-body">
                                        <h5 class="card-title">Batidora de Pedestal</h5>
                                        <p class="card-text">10L, 3 velocidades.</p>
                                        <a href="#" class="btn btn-outline-primary rounded-pill">Ver detalle</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card">
                                    <img src="https://placehold.co/600x400/AAB7B8/909090?text=Microondas" class="card-img-top" alt="Producto">
                                    <div class="card-body">
                                        <h5 class="card-title">Microondas</h5>
                                        <p class="card-text">Uso rudo, acero.</p>
                                        <a href="#" class="btn btn-outline-primary rounded-pill">Ver detalle</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselMaquinas" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselMaquinas" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                </button>
            </div>
        </section>

        <!-- 5. MUEBLERÍA -->
        <section class="mb-5">
            <h2 class="mb-4 section-header">Mueblería</h2>
            <p class="text-muted">Estantes de aluminio, mesas de trabajo, tarjas, etc.</p>
            <div id="carouselMuebleria" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="card">
                                    <img src="https://placehold.co/600x400/99A3A4/909090?text=Estante" class="card-img-top" alt="Producto">
                                    <div class="card-body">
                                        <h5 class="card-title">Estante de Aluminio</h5>
                                        <p class="card-text">4 niveles, alta resistencia.</p>
                                        <a href="#" class="btn btn-outline-primary rounded-pill">Ver detalle</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card">
                                    <img src="https://placehold.co/600x400/99A3A4/909090?text=Mesa" class="card-img-top" alt="Producto">
                                    <div class="card-body">
                                        <h5 class="card-title">Mesa de Trabajo</h5>
                                        <p class="card-text">Acero inoxidable (1.80m).</p>
                                        <a href="#" class="btn btn-outline-primary rounded-pill">Ver detalle</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card">
                                    <img src="https://placehold.co/600x400/99A3A4/909090?text=Tarja" class="card-img-top" alt="Producto">
                                    <div class="card-body">
                                        <h5 class="card-title">Tarja Doble</h5>
                                        <p class="card-text">Grado alimenticio.</p>
                                        <a href="#" class="btn btn-outline-primary rounded-pill">Ver detalle</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselMuebleria" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselMuebleria" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                </button>
            </div>
        </section>

    </main>

    <!-- FOOTER: Copiado de welcome.blade.php para consistencia -->
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
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
    <link rel="stylesheet" href="styles.css">

</head>
<body class="bg-light">
    <!-- Script de Bootstrap debe ir al final del body -->

    <!-- HEADER: Fijo y Estructurado en 3 Columnas -->
    <header class="main-header">
        <div class="container">
            <div class="row align-items-center py-3">
                
                <!-- SECCIÓN 1 (Izquierda): Título y Logo, Alinear a la Derecha (dentro de la columna) -->
                <div class="col-12 col-sm-4 d-flex justify-content-center justify-content-sm-end header-logo">
                    <a class="navbar-brand d-flex align-items-center" href="#" style="font-weight: 700; color: #4A90E2;">
                        <!-- Placeholder de Logo -->
                        <img src="https://placehold.co/30x30/4A90E2/ffffff?text=L" alt="Logo" width="30" height="30" class="d-inline-block me-2 rounded-circle">
                        Mi Proyecto
                    </a>
                </div>

                <!-- SECCIÓN 2 (Centro): 4 Botones de Navegación -->
                <div class="col-12 col-sm-4 d-flex justify-content-center nav-buttons my-2 my-sm-0">
                    <a href="#" class="btn btn-link text-dark text-decoration-none px-2 px-sm-3">Inicio</a>
                    <a href="#" class="btn btn-link text-dark text-decoration-none px-2 px-sm-3">Servicios</a>
                    <a href="#" class="btn btn-link text-dark text-decoration-none px-2 px-sm-3">Precios</a>
                    <a href="#" class="btn btn-link text-dark text-decoration-none px-2 px-sm-3">Contacto</a>
                </div>

                <!-- SECCIÓN 3 (Derecha): Autenticación -->
                <div class="col-12 col-sm-4 text-center text-sm-end header-auth">
                    <a href="{{ route('login') }}" class="btn btn-outline-primary me-2 rounded-pill px-4" style="font-weight: 600;">Iniciar sesión</a>
                    <a href="{{ route('register') }}" class="btn btn-primary rounded-pill px-4" style="font-weight: 600;">Registrarme</a>
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
                    <img src="#" class="d-block w-100" alt="Imagen de carrusel 1">
                    <div class="carousel-caption d-none d-md-block" style="background-color: rgba(0,0,0,0.5); border-radius: 8px;">
                        <h3 style="font-weight: 700;">Bienvenido a Mi Proyecto</h3>
                        <p>Descubre cómo podemos transformar tu negocio con tecnología de punta.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('images/Cocina.jpeg') }}" class="d-block w-100" alt="Imagen de carrusel 2">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('images/Coco.jpg') }}" class="d-block w-100" alt="Imagen de carrusel 3">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('images/Coco.jpg') }}" class="d-block w-100" alt="Imagen de carrusel 4">
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

        <!-- SECCIÓN DE CARDS: Diseño de 2x2 Responsivo -->
        <div class="container py-5">
            <h2 class="text-center mb-5" style="font-weight: 700; color: #343a40;">Nuestros Pilares de Valor</h2>
            <!-- row-cols-md-2 asegura que haya 2 tarjetas por fila en dispositivos medianos y grandes -->
            <div class="row row-cols-1 row-cols-md-2 g-4">
                
                <!-- CARD 1: En la primera fila, lado izquierdo -->
                <div class="col">
                    <div class="card shadow-sm">
                        <img src="https://placehold.co/600x180/4A90E2/ffffff?text=Adaptabilidad" class="card-img-top" alt="Adaptabilidad">
                        <div class="card-body">
                            <h5 class="card-title text-primary" style="font-weight: 600;">Adaptabilidad Total</h5>
                            <p class="card-text">Nuestras soluciones escalan con tu negocio, adaptándose a cualquier volumen de trabajo sin comprometer el rendimiento.</p>
                        </div>
                    </div>
                </div>

                <!-- CARD 2: En la primera fila, lado derecho -->
                <div class="col">
                    <div class="card shadow-sm">
                        <img src="https://placehold.co/600x180/28a745/ffffff?text=Seguridad" class="card-img-top" alt="Seguridad">
                        <div class="card-body">
                            <h5 class="card-title text-success" style="font-weight: 600;">Seguridad Reforzada</h5>
                            <p class="card-text">Implementamos protocolos de seguridad de nivel industrial para proteger tus datos y los de tus clientes las 24 horas del día.</p>
                        </div>
                    </div>
                </div>
                
                <!-- Las siguientes dos tarjetas inician automáticamente en la segunda fila -->

                <!-- CARD 3: En la segunda fila, lado izquierdo -->
                <div class="col">
                    <div class="card shadow-sm">
                        <img src="https://placehold.co/600x180/ffc107/333333?text=Comunidad" class="card-img-top" alt="Comunidad">
                        <div class="card-body">
                            <h5 class="card-title text-warning" style="font-weight: 600;">Comunidad Activa</h5>
                            <p class="card-text">Únete a una red de profesionales y recibe el mejor soporte de nuestra comunidad y nuestro equipo de expertos.</p>
                        </div>
                    </div>
                </div>

                <!-- CARD 4: En la segunda fila, lado derecho -->
                <div class="col">
                    <div class="card shadow-sm">
                        <img src="https://placehold.co/600x180/dc3545/ffffff?text=Innovación" class="card-img-top" alt="Innovación">
                        <div class="card-body">
                            <h5 class="card-title text-danger" style="font-weight: 600;">Innovación Continua</h5>
                            <p class="card-text">Estamos en constante evolución, integrando las últimas tendencias tecnológicas para que siempre estés un paso adelante.</p>
                        </div>
                    </div>
                </div>
                
            </div>
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

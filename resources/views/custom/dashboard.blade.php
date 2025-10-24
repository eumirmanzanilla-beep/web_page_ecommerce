<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Control</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#">Dashboard</a>

        <div class="d-flex">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-outline-light">Cerrar sesión</button>
            </form>
        </div>
    </div>
</nav>

<div class="container py-5">
    <h2 class="mb-4">Hola, {{ Auth::user()->username }} 👋</h2>
    <p class="text-muted">Bienvenido a tu panel personalizado.</p>

    <div class="card shadow-sm p-4 mt-4">
        <h5>Contenido del Dashboard</h5>
        <p>Puedes personalizar esta vista con tus datos, estadísticas o accesos rápidos.</p>
    </div>
</div>

</body>
</html>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container text-center py-5">
        <h1 class="display-5 fw-bold">Bienvenido a Mi Aplicación</h1>
        <p class="lead text-muted">Este es el inicio público. Puedes registrarte o iniciar sesión.</p>

        <div class="mt-4">
            <a href="{{ route('login') }}" class="btn btn-primary me-2">Iniciar sesión</a>
            <a href="{{ route('register') }}" class="btn btn-outline-success">Registrarme</a>
        </div>
    </div>

</body>
</html>

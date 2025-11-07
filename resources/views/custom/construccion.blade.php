<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página en Construcción</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8f9fa;
        }
        .construction-container {
            min-height: 100vh;
            text-align: center;
            padding: 50px 20px;
        }
        .construction-icon {
            font-size: 80px;
            color: #ffc107; /* Amarillo de advertencia */
            margin-bottom: 20px;
        }
        h1 {
            color: #343a40;
            font-weight: 700;
        }
        p {
            color: #6c757d;
            font-size: 1.2rem;
        }
    </style>
</head>
<body>
    <div class="construction-container d-flex flex-column justify-content-center align-items-center">
        <!-- Ícono de engranaje para la construcción -->
        <div class="construction-icon">⚙️</div> 
        <h1>Página en Construcción</h1>
        <p class="mt-3">
            Estamos trabajando arduamente para brindarte el mejor contenido de [Mi Proyecto].
            ¡Vuelve pronto!
        </p>
        <a href="{{ url('/') }}" class="btn btn-primary mt-4 px-5 rounded-pill">Volver al Inicio</a>
    </div>
</body>
</html>
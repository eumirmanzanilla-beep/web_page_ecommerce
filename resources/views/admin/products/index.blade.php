<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Productos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
            <span class="navbar-brand">Gestión de Productos</span>
            <div>
                <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-light btn-sm me-2">Dashboard</a>
                <a href="{{ route('products.index') }}" class="btn btn-outline-light btn-sm me-2">Ver Catálogo</a>
            </div>
        </div>
    </nav>

    <div class="container my-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Productos</h1>
            <a href="{{ route('admin.products.create') }}" class="btn btn-primary">Nuevo Producto</a>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if($products->count() > 0)
            <div class="card">
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Imagen</th>
                                <th>Nombre</th>
                                <th>Categoría</th>
                                <th>Precio</th>
                                <th>Stock</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td>
                                        @if($product->image)
                                            <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}" style="width: 50px; height: 50px; object-fit: cover;">
                                        @else
                                            <span class="text-muted">Sin imagen</span>
                                        @endif
                                    </td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->category->name }}</td>
                                    <td>${{ number_format($product->price, 2) }}</td>
                                    <td>{{ $product->stock }}</td>
                                    <td>
                                        @if($product->active)
                                            <span class="badge bg-success">Activo</span>
                                        @else
                                            <span class="badge bg-secondary">Inactivo</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-sm btn-outline-primary">Editar</a>
                                        <form action="{{ route('admin.products.destroy', $product) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Estás seguro?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="d-flex justify-content-center mt-4">
                {{ $products->links() }}
            </div>
        @else
            <div class="alert alert-info">
                <p>No hay productos. <a href="{{ route('admin.products.create') }}">Crear uno nuevo</a></p>
            </div>
        @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


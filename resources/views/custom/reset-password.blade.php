<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restablecer Contraseña</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/reset-password.css') }}" rel="stylesheet">
</head>
<body>

    <div class="card">
        <div class="card-header text-center">
            <h4>Restablecer Contraseña</h4>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('password.store') }}">
                @csrf

                <!-- Token de restablecimiento -->
                <input type="hidden" name="token" value="{{ $request->route('token') }}">
                <input
                    type="hidden"
                    name="email"
                    value="{{ $request->email }}"
                >

                <!-- Nueva contraseña -->
                <div class="mb-3">
                    <label for="password" class="form-label">Nueva contraseña</label>
                    <input
                        id="password"
                        type="password"
                        name="password"
                        class="form-control @error('password') is-invalid @enderror"
                        required
                        autocomplete="new-password"
                    >
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Confirmar contraseña -->
                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Confirmar contraseña</label>
                    <input
                        id="password_confirmation"
                        type="password"
                        name="password_confirmation"
                        class="form-control @error('password_confirmation') is-invalid @enderror"
                        required
                        autocomplete="new-password"
                    >
                    @error('password_confirmation')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">
                        Restablecer Contraseña
                    </button>
                </div>
            </form>
        </div>
    </div>

</body>
</html>

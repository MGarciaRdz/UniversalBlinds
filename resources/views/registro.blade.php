<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #e3f0ff 0%, #ffffff 100%);
        }
        .card {
            border: 2px solid #0d6efd;
            border-radius: 1.5rem;
        }
        .card-header {
            background-color: #0d6efd;
            color: #fff;
            border-radius: 1.5rem 1.5rem 0 0;
        }
        .form-label {
            color: #0d6efd;
            font-weight: 600;
        }
        .btn-yellow {
            background-color: #ffc107;
            color: #0d6efd;
            border: none;
            font-weight: bold;
        }
        .btn-yellow:hover {
            background-color: #ffcd39;
            color: #0a58ca;
        }
        .form-control:focus {
            border-color: #0d6efd;
            box-shadow: 0 0 0 2px #e3f0ff;
        }
    </style>
</head>
<body>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-header text-center">
                        <h2 class="mb-0">Registro de Usuario</h2>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('registro.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Nombre:</label>
                                <input type="text" id="name" name="name" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Correo Electrónico:</label>
                                <input type="email" id="email" name="email" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Contraseña:</label>
                                <input type="password" id="password" name="password" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label">Confirmar Contraseña:</label>
                                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required>
                            </div>  
                            <button type="submit" class="btn btn-yellow w-100">Registrarse</button>
                            @if ($errors->any())
                                <div class="alert alert-danger mt-3">
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS (opcional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
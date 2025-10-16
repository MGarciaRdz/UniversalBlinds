<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Producto</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body {
            background: linear-gradient(135deg, #e3f0ff 0%, #ffffff 100%);
        }
        .form-card {
            border: 2px solid #0d6efd;
            border-radius: 1.5rem;
            box-shadow: 0 8px 32px rgba(13,110,253,0.08);
        }
        .form-title {
            color: #0d6efd;
            font-weight: 800;
            text-shadow: 0 2px 8px #e3f0ff;
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
        .input-focus:focus {
            border-color: #0d6efd;
            box-shadow: 0 0 0 2px #e3f0ff;
        }
        input[type="file"]::-webkit-file-upload-button {
            background: #ffc107;
            color: #0d6efd;
            border: none;
            border-radius: 0.5rem;
            padding: 0.5em 1em;
            font-weight: bold;
            cursor: pointer;
        }
        input[type="file"]:hover::-webkit-file-upload-button {
            background: #ffcd39;
            color: #0a58ca;
        }
    </style>
</head>
<body>
    <x-navbar :inicio="route('index')" />

    <div class="d-flex justify-content-center align-items-center min-vh-100">
        <div class="form-card bg-white p-5 w-100" style="max-width: 480px;">
            <div class="mb-4 text-center">
                <h1 class="form-title mb-2">Agregar Producto</h1>
                <p class="text-secondary">Llena el formulario para registrar un nuevo producto en el sistema.</p>
                @if(session('success'))
                    <div class="alert alert-success mb-3">
                        {{ session('success') }}
                    </div>
                @endif
            </div>
            <form action="{{ route('productos.store') }}" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="mb-3">
                    <input type="text" name="nombre" id="nombre" placeholder="Nombre del Producto" required class="form-control input-focus">
                </div>
                <div class="mb-3">
                    <input type="text" name="descripcion" id="descripcion" placeholder="Descripción del Producto" required class="form-control input-focus">
                </div>
                <div class="mb-3">
                    <input type="number" name="precio" id="precio" placeholder="Precio del Producto" step="0.01" required class="form-control input-focus">
                </div>
                <div class="mb-4">
                    <input type="file" name="imagen" id="imagen" required class="form-control input-focus">
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-yellow">Agregar Producto</button>
                </div>
            </form>
        </div>
    </div>

    <footer class="text-center text-secondary py-4 small">
        &copy; {{ date('Y') }} Tu Empresa. Todos los derechos reservados.
    </footer>
</body>
</html>
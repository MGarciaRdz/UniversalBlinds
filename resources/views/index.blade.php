<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos | Universal Blinds</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Bootstrap CSS -->
    <style>
        body {
            background: linear-gradient(135deg, #e3f0ff 0%, #ffffff 100%);
        }
        .card {
            border: 2px solid #0d6efd;
            border-radius: 1rem;
        }
        .card-header {
            background-color: #0d6efd;
            color: #fff;
        }
        .card-title {
            color: #0d6efd;
            font-weight: bold;
        }
        .card-text.text-success {
            color: #ffc107 !important; /* Amarillo Bootstrap */
            font-size: 1.2rem;
        }
        .btn-yellow {
            background-color: #ffc107;
            color: #0d6efd;
            border: none;
        }
        .btn-yellow:hover {
            background-color: #ffcd39;
            color: #0a58ca;
        }

        .card:hover {
            box-shadow: 0 8px 16px rgba(13, 110, 253, 0.2);
            transform: translateY(-5px);
            background-color: #dededeff;
            transition: all 0.3s ease;
        }
    </style>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <x-navbar :inicio="route('index')" />

    <div class="container py-5">
        <h1 class="mb-4 text-center fw-bold" style="color: #0d6efd;">Catálogo de Productos</h1>
        <div class="row g-4">
            @foreach ($productos as $producto)
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="card h-100 shadow-sm bg-white">
                        <img src="{{ asset('storage/' . $producto->imagen) }}" alt="{{ $producto->nombre }}" class="card-img-top img-thumbnail mx-auto mt-3" style="width: 150px; height: 150px; object-fit: cover; border: 3px solid #ffc107;">
                        <div class="card-body text-center">
                            <h5 class="card-title">{{ $producto->nombre }}</h5>
                            <p class="card-text text-muted">{{ $producto->descripcion }}</p>
                            <p class="card-text fw-bold text-success">${{ $producto->precio }}</p>
                            <a href="{{ route('producto.visualizado', $producto->id) }}" class="btn btn-yellow mt-2">Ver más</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Bootstrap JS (opcional, para componentes interactivos) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
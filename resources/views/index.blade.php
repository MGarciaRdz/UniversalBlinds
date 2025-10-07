<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos | Universal Blinds</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-light">
    <x-navbar :inicio="route('index')" />

    <div class="container py-5">
        <h1 class="mb-4 text-center fw-bold text-primary">Catálogo de Productos</h1>
        <div class="row g-4">
            @foreach ($productos as $producto)
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="card h-100 shadow-sm">
                        <img src="{{ asset('storage/' . $producto->imagen) }}" alt="{{ $producto->nombre }}" class="card-img-top img-thumbnail mx-auto mt-3" style="width: 150px; height: 150px; object-fit: cover;">
                        <div class="card-body text-center">
                            <h5 class="card-title">{{ $producto->nombre }}</h5>
                            <p class="card-text text-muted">{{ $producto->descripcion }}</p>
                            <p class="card-text fw-bold text-success">${{ $producto->precio }}</p>
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
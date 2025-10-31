<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @php use Illuminate\Support\Str; @endphp

    <style>
       :root{
            --blue:#0d6efd;
            --blue-dark:#0a58ca;
            --yellow:#ffc107;
            --gold:#e0a800;
            --bg: linear-gradient(135deg, #eaf6ff 0%, #ffffff 100%);
        }

        body{
            background: var(--bg);
            color: #0b2540;
        }

        .panel-card{
            max-width: 1100px;
            margin: 2.5rem auto;
            border-radius: 1rem;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(13,110,253,0.08);
            border: 1px solid rgba(13,110,253,0.08);
            background: #ffffff;
        }

        .panel-header{
            background: linear-gradient(90deg, rgba(13,110,253,0.95), rgba(10,88,202,0.9));
            color: #fff;
            padding: 1.2rem 1.5rem;
            display:flex;
            align-items:center;
            justify-content:space-between;
        }

        .panel-header h2{
            margin:0;
            font-weight:700;
            letter-spacing:0.2px;
        }

        .panel-header .sub{
            font-size:0.9rem;
            opacity:0.92;
        }

        .table-card{
            padding:1.25rem;
        }

        .img-thumb {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 0.5rem;
            border: 3px solid var(--yellow);
            background: #fff;
        }

        .btn-gold{
            background: linear-gradient(180deg,var(--yellow),var(--gold));
            color: var(--blue);
            border: none;
            font-weight: 700;
            box-shadow: 0 6px 18px rgba(224,168,0,0.12);
            border-radius: 0.5rem;
        }
        .btn-gold:hover{ filter: brightness(0.98); }

        .btn-outline-blue{
            border-color: rgba(13,110,253,0.14);
            color: var(--blue);
            background: transparent;
            border-radius: 0.45rem;
        }

        thead.table-light th{
            background: linear-gradient(90deg, rgba(240,248,255,0.9), rgba(255,255,255,0.95));
            color: var(--blue-dark);
            border-bottom: 2px solid rgba(13,110,253,0.06);
            vertical-align: middle;
        }

        tbody tr:hover{
            background: rgba(13,110,253,0.03);
        }

        .small-muted{ color: #6c757d; font-size:0.9rem; }

        .search-input{
            max-width: 420px;
        }

        @media (max-width:767px){
            .img-thumb{ width:56px; height:56px; }
            .panel-header{ flex-direction:column; gap:.5rem; align-items:flex-start; }
        }

    </style>

</head>
<body>
    <x-navbar-administrador />
    <h1>Panel de Administración</h1>
    <p>Bienvenido al panel de administración.</p>

 <div class="table-card p-3 shadow-sm">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Imagen</th>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Precio</th>
                            <th>Creado</th>
                            <th class="text-end">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($productos as $producto)
                            <tr>
                                <td>
                                    @if($producto->imagen)
                                        <img src="{{ asset('storage/' . $producto->imagen) }}" alt="{{ $producto->nombre }}" class="img-thumb">
                                    @else
                                        <span class="text-muted small">Sin imagen</span>
                                    @endif
                                </td>
                                <td class="fw-semibold">{{ $producto->nombre }}</td>
                                <td class="text-muted">{{ Str::limit($producto->descripcion, 60) }}</td>
                                <td class="text-warning fw-bold">${{ number_format($producto->precio, 2) }}</td>
                                <td class="text-secondary small">{{ $producto->created_at->format('Y-m-d') }}</td>
                                <td class="text-end">
                                    <a href="{{ route('productos.show', $producto->id) }}" class="btn btn-sm btn-outline-primary me-1">Ver</a>

                                    <!-- Editar: crea la ruta y vista si no existen -->
                                    <a href="" class="btn btn-sm btn-outline-secondary me-1">Editar</a>

                                    <!-- Eliminar: crea la ruta productos.destroy en web.php y el método en el controlador -->
                                    <form action="{{ route('productos.destroy', $producto->id) ?? '#' }}" method="POST" class="d-inline" onsubmit="return confirm('¿Eliminar producto?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted">No hay productos registrados.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
</body>
</html>
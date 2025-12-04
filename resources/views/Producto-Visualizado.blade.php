<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ $Producto->nombre ?? 'Producto' }} | Universal Blinds</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root{
            --blue: #0d6efd;
            --blue-dark: #0a58ca;
            --gold: #e0a800;
            --yellow: #ffc107;
            --bg: linear-gradient(135deg, #eaf6ff 0%, #ffffff 100%);
        }

        body{
            background: var(--bg);
            color: #0b2540;
            -webkit-font-smoothing:antialiased;
        }

        .product-card{
            max-width: 1100px;
            margin: 3rem auto;
            border-radius: 1rem;
            overflow: hidden;
            box-shadow: 0 12px 30px rgba(13,110,253,0.08);
            border: 1px solid rgba(13,110,253,0.06);
            background: #ffffff;
        }

        .product-header{
            padding: 1.25rem 1.5rem;
            background: linear-gradient(90deg, rgba(13,110,253,0.95), rgba(10,88,202,0.9));
            color: #fff;
            display:flex;
            align-items:center;
            justify-content:space-between;
            gap:1rem;
        }

        .product-title{ font-weight:700; margin:0; }
        .product-sub{ opacity:0.92; font-size:0.95rem; }

        .product-body{ padding:1.5rem; }

        .img-panel{
            display:flex;
            align-items:center;
            justify-content:center;
            background: #f8fbff;
            border-radius: .75rem;
            padding: .75rem;
        }

        .product-img{
            max-width:100%;
            max-height:420px;
            object-fit:cover;
            border-radius: .625rem;
            border: 4px solid var(--yellow);
            background:#fff;
        }

        .price{
            color: var(--yellow);
            font-weight:800;
            font-size:1.6rem;
        }

        .btn-gold{
            background: linear-gradient(180deg,var(--yellow),var(--gold));
            color: var(--blue);
            border: none;
            font-weight: 700;
            border-radius: .5rem;
            padding: .5rem .9rem;
            box-shadow: 0 8px 22px rgba(224,168,0,0.12);
        }
        .btn-gold:hover{ filter:brightness(.98); }

        .meta small{ color:#6c757d; }

        @media (max-width: 767px){
            .product-header{ flex-direction:column; align-items:flex-start; gap:.5rem; }
            .product-img{ max-height:280px; }
        }

        #volver:hover {
            color: black !important;
        }
    </style>
</head>
<body>
    <x-navbar :inicio="route('index')" />

    <div class="product-card">
        <div class="product-header">
             <div class="d-flex gap-2 align-items-center">
                <a href="{{ route('index') }}" id="volver" class="btn btn-outline-light" style="border-color: rgba(255,255,255,0.18); color:#fff;">Volver</a>
            </div>

            <div>
                <h2 class="product-title">{{ $Producto->nombre }}</h2>
                <div class="product-sub">Detalle del producto</div>
            </div>

           
        </div>

        <div class="product-body">
            <div class="row g-4">
                <div class="col-md-5">
                    <div class="img-panel">
                        @if($Producto->imagen)
                            <img src="{{ asset('storage/' . $Producto->imagen) }}" alt="{{ $Producto->nombre }}" class="product-img">
                        @else
                            <div class="text-center p-4">
                                <div style="width:240px;height:240px;border-radius:.5rem;background:#f5f9ff;display:flex;align-items:center;justify-content:center;border:3px dashed rgba(13,110,253,0.06);">
                                    <small class="text-muted">Sin imagen</small>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="col-md-7">
                    <div class="mb-3">
                        <h3 class="mb-1">{{ $Producto->nombre }}</h3>
                        <div class="meta mb-2"><small>Publicado: {{ optional($Producto->created_at)->format('Y-m-d') }}</small></div>
                        <div class="price mb-3">${{ number_format($Producto->precio, 2) }}</div>
                    </div>

                    <div class="mb-4">
                        <h5 class="mb-2" style="color:var(--blue);font-weight:700;">Descripción</h5>
                        <p class="text-muted" style="line-height:1.6;">{{ $Producto->descripcion ?? 'Sin descripción' }}</p>
                    </div>

                    <div class="d-flex gap-2">
                    <form action="{{ route('carrito.agregar') }}" method="POST">
                        @csrf

                        <input type="hidden" name="producto_id" value="{{ $Producto->id }}">
                        <input type="hidden" name="nombre" value="{{ $Producto->nombre }}">
                        <input type="hidden" name="precio" value="{{ $Producto->precio }}">
                        <input type="hidden" name="cantidad" value="1">

                        <button type="submit" class="btn btn-gold">Agregar al carrito</button>
                    </form>

                    <a href="" class="btn btn-outline-primary">Comprar</a>
                </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="text-center py-4 small text-secondary">
        &copy; {{ date('Y') }} Universal Blinds
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
</body>
</html>
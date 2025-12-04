<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de Compras | Universal Blinds</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --blue: #0d6efd;
            --blue-dark: #0a58ca;
            --yellow: #ffc107;
            --gold: #e0a800;
            --bg: linear-gradient(135deg, #eaf6ff 0%, #ffffff 100%);
        }

        body {
            background: var(--bg);
            color: #0b2540;
        }

        .cart-container {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 0 1rem;
        }

        .cart-header {
            background: linear-gradient(90deg, rgba(13,110,253,0.95), rgba(10,88,202,0.9));
            color: #fff;
            padding: 1.5rem;
            border-radius: 1rem 1rem 0 0;
            margin-bottom: 2rem;
        }

        .cart-header h1 {
            margin: 0;
            font-weight: 700;
        }

        .cart-items {
            background: #fff;
            border-radius: 1rem;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(13,110,253,0.08);
            border: 1px solid rgba(13,110,253,0.06);
            margin-bottom: 2rem;
        }

        .cart-item {
            display: flex;
            gap: 1.5rem;
            padding: 1.5rem;
            border-bottom: 1px solid rgba(13,110,253,0.06);
            align-items: center;
        }

        .cart-item:last-child {
            border-bottom: none;
        }

        .cart-item-img {
            width: 120px;
            height: 120px;
            object-fit: cover;
            border-radius: 0.5rem;
            border: 3px solid var(--yellow);
            background: #f8fbff;
        }

        .cart-item-details {
            flex: 1;
        }

        .cart-item-name {
            font-weight: 700;
            color: var(--blue);
            margin-bottom: 0.5rem;
            font-size: 1.1rem;
        }

        .cart-item-price {
            color: var(--gold);
            font-weight: 800;
            font-size: 1.3rem;
            margin-bottom: 0.75rem;
        }

        .quantity-control {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .quantity-control button {
            background: var(--yellow);
            color: var(--blue);
            border: none;
            width: 32px;
            height: 32px;
            border-radius: 0.35rem;
            cursor: pointer;
            font-weight: 700;
            transition: all 0.2s;
        }

        .quantity-control button:hover {
            background: var(--gold);
            transform: scale(1.05);
        }

        .quantity-control input {
            width: 50px;
            text-align: center;
            border: 2px solid rgba(13,110,253,0.12);
            border-radius: 0.35rem;
            padding: 0.4rem;
            font-weight: 600;
        }

        .remove-btn {
            background: #dc3545;
            color: #fff;
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 0.35rem;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.2s;
        }

        .remove-btn:hover {
            background: #c82333;
            transform: scale(1.02);
        }

        .empty-cart {
            text-align: center;
            padding: 3rem 1rem;
        }

        .empty-cart-icon {
            font-size: 4rem;
            color: rgba(13,110,253,0.1);
            margin-bottom: 1rem;
        }

        .cart-summary {
            background: #fff;
            border-radius: 1rem;
            padding: 1.5rem;
            box-shadow: 0 10px 30px rgba(13,110,253,0.08);
            border: 1px solid rgba(13,110,253,0.06);
            max-width: 400px;
            margin-left: auto;
        }

        .summary-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 1rem;
            font-weight: 600;
        }

        .summary-row.total {
            border-top: 2px solid rgba(13,110,253,0.1);
            padding-top: 1rem;
            font-size: 1.3rem;
            color: var(--gold);
        }

        .btn-checkout {
            background: linear-gradient(180deg, var(--yellow), var(--gold));
            color: var(--blue);
            border: none;
            padding: 0.75rem 1.5rem;
            border-radius: 0.5rem;
            font-weight: 700;
            width: 100%;
            margin-top: 1rem;
            cursor: pointer;
            box-shadow: 0 8px 22px rgba(224,168,0,0.12);
            transition: all 0.2s;
        }

        .btn-checkout:hover {
            filter: brightness(0.98);
            transform: translateY(-2px);
        }

        .btn-continue {
            background: transparent;
            color: var(--blue);
            border: 2px solid var(--blue);
            padding: 0.75rem 1.5rem;
            border-radius: 0.5rem;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.2s;
        }

        .btn-continue:hover {
            background: rgba(13,110,253,0.05);
        }

        @media (max-width: 768px) {
            .cart-item {
                flex-direction: column;
                gap: 1rem;
            }

            .cart-summary {
                max-width: 100%;
                margin-left: 0;
                margin-top: 2rem;
            }
        }
    </style>
</head>
<body>
    <x-navbar />

    <div class="cart-container">
        <div class="cart-header">
            <h1>🛒 Mi Carrito de Compras</h1>
        </div>

        <div class="row">
            <div class="col-lg-8">
                <div class="cart-items">
                    <!-- Ejemplo de item en carrito -->
                    @if(session('carrito') && count(session('carrito')) > 0)
                        @foreach(session('carrito') as $item)
                            <div class="cart-item">
                                <img src="{{ asset('storage/' . $item['imagen']) }}" alt="" class="cart-item-img">
                                <div class="cart-item-details">
                                   <div class="cart-item-details">
                                        <div class="cart-item-name">{{ $item['nombre'] }}</div>
                                        <div class="cart-item-price">${{ number_format($item['precio'], 2) }}</div>

                                        <!-- NUEVO: Subtotal del producto -->
                                        <div class="cart-item-subtotal" style="font-weight: 700; margin-bottom: .5rem;">
                                            ${{ number_format($item['precio'] * $item['cantidad'], 2) }}
                                        </div>

                                        <div class="quantity-control">
                                            <button onclick="decreaseQty(this)">−</button>
                                            <input type="number" value="{{ $item['cantidad'] }}" min="1" readonly data-price="{{ $item['precio'] }}" class="qty-input">
                                            <button onclick="increaseQty(this)">+</button>
                                        </div>
                                    </div>

                                </div>
                                <form action="" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="remove-btn">Eliminar</button>
                                </form>
                            </div>
                        @endforeach
                    @else
                        <div class="empty-cart">
                            <div class="empty-cart-icon">🛍️</div>
                            <h3 class="text-muted">Tu carrito está vacío</h3>
                            <p class="text-secondary mb-3">Agrega productos para empezar a comprar</p>
                            <a href="{{ route('index') }}" class="btn btn-continue">Continuar comprando</a>
                        </div>
                    @endif
                </div>
            </div>

            <div class="col-lg-4">
                <div class="cart-summary">
                    <h5 class="mb-3" style="color: var(--blue); font-weight: 700;">Resumen de compra</h5>

                    <div class="summary-row">
                        <span>Subtotal:</span>
                        <span id="subtotal">${{ number_format(session('subtotal', 0), 2) }}</span>
                    </div>

                    <div class="summary-row">
                        <span>Impuesto (10%):</span>
                        <span id="tax">${{ number_format(session('subtotal', 0) * 0.1, 2) }}</span>
                    </div>

                    <div class="summary-row total">
                        <span>Total:</span>
                        <span id="total">${{ number_format(session('subtotal', 0) * 1.1, 2) }}</span>
                    </div>


                    <button class="btn-checkout">Proceder al pago</button>
                    <a href="{{ route('index') }}" class="btn btn-continue">Continuar comprando</a>
                </div>
            </div>
        </div>
    </div>

    <footer class="text-center py-4 small text-secondary mt-5">
        &copy; {{ date('Y') }} Universal Blinds
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
function updateTotals() {
    let subtotal = 0;

    document.querySelectorAll('.qty-input').forEach(input => {
        const price = parseFloat(input.dataset.price);
        const qty = parseInt(input.value);
        const itemSubtotal = price * qty;

        // Actualizar subtotal por producto
        input.closest('.cart-item-details')
             .querySelector('.cart-item-subtotal')
             .textContent = "$" + itemSubtotal.toFixed(2);

        subtotal += itemSubtotal;
    });

    const tax = subtotal * 0.10;
    const total = subtotal + tax;

    // Mostrar resultados
    document.getElementById('subtotal').textContent = "$" + subtotal.toFixed(2);
    document.getElementById('tax').textContent = "$" + tax.toFixed(2);
    document.getElementById('total').textContent = "$" + total.toFixed(2);
}

function increaseQty(btn) {
    const input = btn.previousElementSibling;
    input.value = parseInt(input.value) + 1;
    updateTotals();
}

function decreaseQty(btn) {
    const input = btn.nextElementSibling;
    if (parseInt(input.value) > 1) {
        input.value = parseInt(input.value) - 1;
        updateTotals();
    }
}
</script>

</body>
</html>
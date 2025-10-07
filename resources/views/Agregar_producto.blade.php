<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Producto</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @vite('resources/css/style.css')
</head>
<body class="">

    <x-navbar :inicio="route('index')" />

    <div class="flex-grow flex justify-center items-center">
        <div class="w-full max-w-lg bg-white rounded-3xl shadow-2xl p-10 border border-teal-100">
            <div class="flex flex-col items-center mb-8">
               
                <h1 class="text-4xl font-extrabold text-teal-700 mb-2 text-center drop-shadow">Agregar Producto</h1>
                <p class="text-base text-gray-500 text-center">Llena el formulario para registrar un nuevo producto en el sistema.</p>
                @if(session('success'))
                    <div class="bg-green-100 text-green-700 p-4 rounded-lg mb-4 text-center">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('productos.store') }}" enctype="multipart/form-data" method="POST" class="space-y-6">
                    @csrf
                    <div>
                        <input type="text" name="nombre" id="nombre" placeholder="Nombre del Producto" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-400">
                    </div>
                    <div>
                        <input type="text" name="descripcion" id="descripcion" placeholder="Descripción del Producto" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-400">
                    </div>
                    <div>
                        <input type="number" name="precio" id="precio" placeholder="Precio del Producto" step="0.01" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-400">
                    </div>
                    <div>
                        <input type="file" name="imagen" id="imagen" placeholder="Imagen del Producto" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-400">
                    </div>
                    <div class="flex justify-center">
                        <button type="submit" class="bg-teal-500 text-white px-6 py-2 rounded-lg hover:bg-teal-600 focus:outline-none focus:ring-2 focus:ring-teal-400">Agregar Producto</button>
                    </div>

                </form>
            </div>

        </div>
    </div>

    <footer class="text-center text-gray-400 py-6 text-sm">
        &copy; {{ date('Y') }} Tu Empresa. Todos los derechos reservados.
    </footer>

</body>
</html>
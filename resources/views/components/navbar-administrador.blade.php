<div>
    
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Universal Blinds</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{ route('admin.index') }}">Inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('productos.create') }}">agregar productos</a>
        </li>
        <li class="nav-item">
          <!-- <a class="nav-link" href="#">Cerrar sesión</a> -->
          <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-link nav-link">Cerrar sesión</button>
          </form>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Usuarios
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="{{ route('usuarios.index') }}">Ver usuarios</a></li>
            <li><a class="dropdown-item" href="#">Agregar usuario</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
    <!-- Let all your things have their places; let each part of your business have its time. - Benjamin Franklin -->
</div>
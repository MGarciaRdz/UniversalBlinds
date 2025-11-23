<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])

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
          }
    </style>

</head>
<body>
    <x-navbar-administrador />
    

    <div class="panel-card">
        <div class="panel-header">
            <h2>Lista de Usuarios</h2>
            <span class="sub">Administración de usuarios registrados</span>
        </div>
        <div class="table-card">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Rol</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($usuarios as $usuario)
                    <tr>
                        <td>{{ $usuario->id }}</td>
                        <td>{{ $usuario->name }}</td>
                        <td>{{ $usuario->email }}</td>
                        <td>{{ $usuario->role }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    
</body>
</html>
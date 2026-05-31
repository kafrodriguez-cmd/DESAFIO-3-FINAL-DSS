<!DOCTYPE html>
<html lang="es">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>DataAudit Labs</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body style="margin:0;background:#f4f6f9;">

<div style="display:flex;min-height:100vh;">

    <!-- SIDEBAR -->

    <div style="
        width:260px;
        background:#0d6efd;
        color:white;
        padding:20px;
    ">

        <h2>DataAudit Labs</h2>

        <hr>

        <div style="text-align:center;margin-bottom:25px;">

            <div style="
                width:70px;
                height:70px;
                border-radius:50%;
                background:white;
                color:#0d6efd;
                margin:auto;
                display:flex;
                align-items:center;
                justify-content:center;
                font-size:24px;
                font-weight:bold;
            ">
                {{ strtoupper(substr(Auth::user()->name,0,1)) }}
            </div>

            <h4 style="margin-top:10px;">
                {{ Auth::user()->name }}
            </h4>

        </div>

        <a href="{{ route('dashboard') }}"
           style="
           display:block;
           background:#084298;
           color:white;
           text-decoration:none;
           padding:12px;
           margin-bottom:10px;
           border-radius:8px;">
            🏠 Menú Principal
        </a>

        <a href="{{ route('tareas.index') }}"
           style="
           display:block;
           background:#084298;
           color:white;
           text-decoration:none;
           padding:12px;
           margin-bottom:10px;
           border-radius:8px;">
            📋 Mis Tareas
        </a>

        <a href="{{ route('profile.edit') }}"
           style="
           display:block;
           background:#084298;
           color:white;
           text-decoration:none;
           padding:12px;
           margin-bottom:10px;
           border-radius:8px;">
            👤 Mi Perfil
        </a>

        <form method="POST"
              action="{{ route('logout') }}">

            @csrf

            <button type="submit"
                    style="
                    width:100%;
                    border:none;
                    background:#dc3545;
                    color:white;
                    padding:12px;
                    border-radius:8px;
                    cursor:pointer;">
                🚪 Cerrar Sesión
            </button>

        </form>

    </div>

    <!-- CONTENIDO -->

    <div style="flex:1;padding:25px;">

        @isset($header)

            <div style="
                background:white;
                padding:20px;
                border-radius:10px;
                margin-bottom:20px;
                box-shadow:0 0 10px rgba(0,0,0,.1);
            ">
                {{ $header }}
            </div>

        @endisset

        {{ $slot }}

    </div>

</div>

</body>
</html>

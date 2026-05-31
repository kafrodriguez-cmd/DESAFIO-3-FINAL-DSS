<x-app-layout>

<x-slot name="header">

    <h2 style="font-size:28px;font-weight:bold;color:#0d6efd;">
        Menú Principal:
    </h2>

</x-slot>

<div style="display:grid;grid-template-columns:repeat(2,1fr);gap:20px;">

    <div style="
        background:#F2AA00;
        padding:15px;
        border-radius:10px;
        box-shadow:0 0 10px rgba(0,0,0,.1);
    ">

        <h2>Bienvenido {{ Auth::user()->name }}</h2>

        <p>
            Sistema de Gestión de Tareas DataAudit Labs.
        </p>

    </div>

    <div style="
        background:#009DF2;
        padding:25px;
        border-radius:5px;
    ">

        <h3>Mis Tareas</h3>

        <p>
            Gestiona tus Actividades Personales.
        </p>

        <a href="{{ route('tareas.index') }}"
           style="
           background:#729E11;
           color:white;
           padding:1px 12px;
           text-decoration:none;
           border-radius:5px;">
            Ver Tareas
        </a>

    </div>

    <div style="
        background:#9747FC;
        padding:35px;
        border-radius:23px;
    ">

        <h3>Mi Perfil</h3>

        <p>
            Actualiza tus Datos Personales.
        </p>

        <a href="{{ route('profile.edit') }}"
           style="
           background:#E86B6B;
           color:white;
           padding:1px 12px;
           text-decoration:none;
           border-radius:5px;">
            Ver Perfil
        </a>

    </div>

</div>

</x-app-layout>
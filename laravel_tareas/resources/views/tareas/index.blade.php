<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mis Tareas</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<div class="container mt-5">

    <h1 class="mb-4 text-primary fw-bold">
        Gestión de Tareas
    </h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="mb-3">
        <a href="{{ route('tareas.create') }}" class="btn btn-primary">
            Crear tarea
        </a>

        <a href="{{ url('/') }}" class="btn btn-secondary">
            Inicio
        </a>
    </div>

    @if($tareas->count() > 0)

        @foreach($tareas as $tarea)

            <div class="card mb-3 shadow" id="tarea-{{ $tarea->id }}">

                <div class="card-body">

                    <h5 class="card-title">
                        {{ $tarea->titulo }}
                    </h5>

                    <p class="card-text">
                        {{ $tarea->descripcion }}
                    </p>

                    <div class="mb-3">

                        @if($tarea->estado == 'Pendiente')

                            <span class="badge bg-warning text-dark">
                                Pendiente
                            </span>

                            <button class="btn btn-success btn-sm"
                                    onclick="cambiarEstado({{ $tarea->id }}, 'Completada')">
                                Realizada
                            </button>

                        @else

                            <span class="badge bg-success">
                                Completada
                            </span>

                            <button class="btn btn-warning btn-sm"
                                    onclick="cambiarEstado({{ $tarea->id }}, 'Pendiente')">
                                Pendiente
                            </button>

                        @endif

                    </div>

                    <hr>

                    <a href="{{ route('tareas.edit', $tarea->id) }}"
                       class="btn btn-warning">
                        Editar
                    </a>

                    <button class="btn btn-danger"
                            onclick="eliminarTarea({{ $tarea->id }})">
                        Eliminar
                    </button>

                </div>

            </div>

        @endforeach

    @else

        <div class="alert alert-info">
            No Tienes Tareas Registradas.
        </div>

    @endif

</div>

<!-- AJAX SCRIPT -->
<script>
const csrfToken = '{{ csrf_token() }}';

/* =========================
   CAMBIAR ESTADO
========================= */
function cambiarEstado(id, estado) {
    fetch(`/tareas/${id}`, {
        method: 'PUT',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrfToken
        },
        body: JSON.stringify({
            estado: estado
        })
    })
    .then(res => res.json())
    .then(data => {
        if (data.success) {
            location.reload(); // actualización sin reload
        } else {
            alert(data.message);
        }
    })
    .catch(error => console.error(error));
}

/* =========================
   ELIMINAR TAREA
========================= */
function eliminarTarea(id) {
    if (!confirm('¿Desea eliminar esta tarea?')) return;

    fetch(`/tareas/${id}`, {
        method: 'DELETE',
        headers: {
            'X-CSRF-TOKEN': csrfToken
        }
    })
    .then(res => res.json())
    .then(data => {
        if (data.success) {
            document.getElementById(`tarea-${id}`).remove();
        } else {
            alert(data.message);
        }
    })
    .catch(error => console.error(error));
}
</script>

</body>
</html>
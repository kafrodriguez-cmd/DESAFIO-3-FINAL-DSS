<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Tarea - DataAudit Labs</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{
            background: linear-gradient(135deg,#0d6efd,#6ea8fe);
            min-height:100vh;
        }

        .contenedor{
            max-width:700px;
            margin:auto;
            padding-top:50px;
        }

        .card{
            border:none;
            border-radius:15px;
        }

        .card-header{
            border-radius:15px 15px 0 0 !important;
        }
    </style>
</head>
<body>

<div class="container contenedor">

    <div class="card shadow-lg">

        <div class="card-header bg-primary text-white">
            <h3 class="mb-0">➕ Crear Nueva Tarea</h3>
        </div>

        <div class="card-body">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('tareas.store') }}" method="POST">

                @csrf

                <div class="mb-3">
                    <label class="form-label fw-bold">
                        Título
                    </label>

                    <input type="text"
                           name="titulo"
                           class="form-control"
                           value="{{ old('titulo') }}"
                           required>
                </div>

                <div class="mb-4">
                    <label class="form-label fw-bold">
                        Descripción
                    </label>

                    <textarea name="descripcion"
                              class="form-control"
                              rows="5">{{ old('descripcion') }}</textarea>
                </div>

                <button type="submit" class="btn btn-primary">
                    Guardar Tarea
                </button>

                <a href="{{ route('tareas.index') }}"
                   class="btn btn-secondary">
                    Volver
                </a>

            </form>

        </div>

    </div>

</div>

</body>
</html>
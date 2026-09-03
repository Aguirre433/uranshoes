<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categorías</title>
</head>
<body>

    <h1>Listado de Categorías</h1>

    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <a href="{{ route('categorias.create') }}">
        Nueva Categoría
    </a>

    <br><br>

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody>
            @foreach($categorias as $categoria)
                <tr>
                    <td>{{ $categoria->id }}</td>

                    <td>{{ $categoria->nombre_categoria }}</td>

                    <td>{{ $categoria->descripcion_categoria }}</td>

                    <td>
                        <a href="{{ route('categorias.edit', $categoria) }}">
                            Editar
                        </a>

                        <form action="{{ route('categorias.destroy', $categoria) }}"
                              method="POST"
                              style="display:inline;">

                            @csrf
                            @method('DELETE')

                            <button type="submit">
                                Eliminar
                            </button>

                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>
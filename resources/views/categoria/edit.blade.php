<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Categoría</title>
</head>
<body>

    <h1>Editar Categoría</h1>

    <form action="{{ route('categorias.update', $categoria) }}" method="POST">

        @csrf
        @method('PUT')

        <div>
            <label for="nombre_categoria">
                Nombre de categoría:
            </label>

            <input
                type="text"
                id="nombre_categoria"
                name="nombre_categoria"
                value="{{ old('nombre_categoria', $categoria->nombre_categoria) }}"
            >

            @error('nombre_categoria')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <br>

        <div>
            <label for="descripcion_categoria">
                Descripción:
            </label>

            <textarea
                id="descripcion_categoria"
                name="descripcion_categoria"
            >{{ old('descripcion_categoria', $categoria->descripcion_categoria) }}</textarea>

            @error('descripcion_categoria')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <br>

        <button type="submit">
            Actualizar
        </button>

    </form>

    <br>

    <a href="{{ route('categorias.index') }}">
        Volver al listado
    </a>

</body>
</html>
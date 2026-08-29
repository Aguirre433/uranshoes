<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Producto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">

    <h2>Editar Producto #{{ $producto->id }}</h2>

    <form action="{{ route('productos.update', $producto->id) }}" method="POST" class="mt-4">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Nombre del producto</label>
            <input type="text" name="nombre" class="form-control" value="{{ $producto->nombre }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Descripción</label>
            <textarea name="descripcion" class="form-control" rows="2">{{ $producto->descripcion }}</textarea>
        </div>

        <div class="row">
            <div class="col-md-4 mb-3">
                <label class="form-label">Precio ($)</label>
                <input type="number" step="0.01" name="precio" class="form-control" value="{{ $producto->precio }}" required>
            </div>
            <div class="col-md-4 mb-3">
                <label class="form-label">Talle</label>
                <input type="text" name="talle" class="form-control" value="{{ $producto->talle }}">
            </div>
            <div class="col-md-4 mb-3">
                <label class="form-label">Color</label>
                <input type="text" name="color" class="form-control" value="{{ $producto->color }}">
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar Producto</button>
        <a href="{{ route('productos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>

</body>
</html>
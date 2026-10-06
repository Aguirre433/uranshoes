<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UrbanShoes - Nuevo Producto</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >
</head>

<body class="bg-light">

<div class="container mt-5 mb-5">

    <div class="card shadow-sm">

        <div class="card-header bg-dark text-white">
            <h3 class="mb-0">👟 Agregar Nuevo Producto</h3>
        </div>

        <div class="card-body">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Se encontraron algunos errores:</strong>

                    <ul class="mb-0 mt-2">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('productos.store') }}" method="POST">

                @csrf

                <!-- Nombre -->
                <div class="mb-3">
                    <label class="form-label fw-bold">
                        Nombre del producto
                    </label>

                    <input
                        type="text"
                        name="nombre"
                        class="form-control"
                        value="{{ old('nombre') }}"
                        required
                    >
                </div>

                <!-- Descripción -->
                <div class="mb-3">
                    <label class="form-label fw-bold">
                        Descripción
                    </label>

                    <textarea
                        name="descripcion"
                        class="form-control"
                        rows="3"
                    >{{ old('descripcion') }}</textarea>
                </div>

                <!-- Precio / Talle / Color -->
                <div class="row">

                    <div class="col-md-4 mb-3">
                        <label class="form-label fw-bold">
                            Precio ($)
                        </label>

                        <input
                            type="number"
                            step="0.01"
                            name="precio"
                            class="form-control"
                            value="{{ old('precio') }}"
                            required
                        >
                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="form-label fw-bold">
                            Talle
                        </label>

                        <input
                            type="text"
                            name="talle"
                            class="form-control"
                            value="{{ old('talle') }}"
                        >
                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="form-label fw-bold">
                            Color
                        </label>

                        <input
                            type="text"
                            name="color"
                            class="form-control"
                            value="{{ old('color') }}"
                        >
                    </div>

                </div>

                <hr class="my-4">

                <h5 class="mb-3">Información relacionada</h5>

                <div class="row">

                    <!-- Proveedor -->
                    <div class="col-md-4 mb-3">

                        <label class="form-label fw-bold">
                            Proveedor
                        </label>

                        <select
                            name="proveedor_id"
                            class="form-select"
                            required
                        >
                            <option value="">
                                Seleccionar proveedor
                            </option>

                            @foreach ($proveedores as $proveedor)

                                <option
                                    value="{{ $proveedor->id }}"
                                    {{ old('proveedor_id') == $proveedor->id ? 'selected' : '' }}
                                >
                                    {{ $proveedor->nombre }}
                                </option>

                            @endforeach

                        </select>

                    </div>

                    <!-- Categoría -->
                    <div class="col-md-4 mb-3">

                        <label class="form-label fw-bold">
                            Categoría
                        </label>

                        <select
                            name="categoria_id"
                            class="form-select"
                            required
                        >
                            <option value="">
                                Seleccionar categoría
                            </option>

                            @foreach ($categorias as $categoria)

                                <option
                                    value="{{ $categoria->id }}"
                                    {{ old('categoria_id') == $categoria->id ? 'selected' : '' }}
                                >
                                    {{ $categoria->nombre }}
                                </option>

                            @endforeach

                        </select>

                    </div>

                    <!-- Marca -->
                    <div class="col-md-4 mb-3">

                        <label class="form-label fw-bold">
                            Marca
                        </label>

                        <select
                            name="marca_id"
                            class="form-select"
                            required
                        >
                            <option value="">
                                Seleccionar marca
                            </option>

                            @foreach ($marcas as $marca)

                                <option
                                    value="{{ $marca->id }}"
                                    {{ old('marca_id') == $marca->id ? 'selected' : '' }}
                                >
                                    {{ $marca->nombre_marca }}
                                </option>

                            @endforeach

                        </select>

                    </div>

                </div>

                <div class="mt-4">

                    <button type="submit" class="btn btn-success">
                        💾 Guardar Producto
                    </button>

                    <a
                        href="{{ route('productos.index') }}"
                        class="btn btn-secondary"
                    >
                        Cancelar
                    </a>

                </div>

            </form>

        </div>

    </div>

</div>

</body>
</html>
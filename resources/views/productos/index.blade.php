<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>UrbanShoes - Productos</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5 mb-5">

    {{-- Encabezado --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h2 class="fw-bold">👟 Productos</h2>
            <p class="text-muted mb-0">
                Administración de productos de UrbanShoes
            </p>
        </div>

        <a
            href="{{ route('productos.create') }}"
            class="btn btn-primary"
        >
            ➕ Nuevo Producto
        </a>

    </div>


    {{-- Mensaje de éxito --}}
    @if(session('success'))

        <div class="alert alert-success alert-dismissible fade show">

            {{ session('success') }}

            <button
                type="button"
                class="btn-close"
                data-bs-dismiss="alert"
            ></button>

        </div>

    @endif


    {{-- Tabla --}}
    <div class="card shadow-sm">

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-bordered table-hover align-middle">

                    <thead class="table-dark">

                        <tr>
                            <th>ID</th>
                            <th>Producto</th>
                            <th>Precio</th>
                            <th>Talle</th>
                            <th>Color</th>
                            <th>Categoría</th>
                            <th>Marca</th>
                            <th>Proveedor</th>
                            <th>Acciones</th>
                        </tr>

                    </thead>


                    <tbody>

                        @forelse($productos as $producto)

                            <tr>

                                {{-- ID --}}
                                <td>
                                    {{ $producto->id }}
                                </td>


                                {{-- Producto --}}
                                <td>

                                    <strong>
                                        {{ $producto->nombre }}
                                    </strong>

                                    @if($producto->descripcion)

                                        <br>

                                        <small class="text-muted">
                                            {{ $producto->descripcion }}
                                        </small>

                                    @endif

                                </td>


                                {{-- Precio --}}
                                <td>

                                    <strong>
                                        ${{ number_format($producto->precio, 2, ',', '.') }}
                                    </strong>

                                </td>


                                {{-- Talle --}}
                                <td>
                                    {{ $producto->talle ?? '—' }}
                                </td>


                                {{-- Color --}}
                                <td>
                                    {{ $producto->color ?? '—' }}
                                </td>


                                {{-- Categoría --}}
                                <td>

                                    @if($producto->categoria)

                                        <span class="badge bg-secondary">
                                            {{ $producto->categoria->nombre_categoria }}
                                        </span>

                                    @else

                                        <span class="text-muted">
                                            Sin categoría
                                        </span>

                                    @endif

                                </td>


                                {{-- Marca --}}
                                <td>

                                    @if($producto->marca)

                                        <strong>
                                            {{ $producto->marca->nombre_marca }}
                                        </strong>

                                    @else

                                        <span class="text-muted">
                                            Sin marca
                                        </span>

                                    @endif

                                </td>


                                {{-- Proveedor --}}
                                <td>

                                    @if($producto->proveedor)

                                        {{ $producto->proveedor->nombre }}

                                    @else

                                        <span class="text-muted">
                                            Sin proveedor
                                        </span>

                                    @endif

                                </td>


                                {{-- Acciones --}}
                                <td>

                                    <div class="d-flex gap-1">

                                        <a
                                            href="{{ route('productos.edit', $producto->id) }}"
                                            class="btn btn-sm btn-warning"
                                        >
                                            ✏️
                                        </a>


                                        <form
                                            action="{{ route('productos.destroy', $producto->id) }}"
                                            method="POST"
                                        >

                                            @csrf
                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="btn btn-sm btn-danger"
                                                onclick="return confirm('¿Está seguro de eliminar este producto?')"
                                            >
                                                🗑️
                                            </button>

                                        </form>

                                    </div>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td
                                    colspan="9"
                                    class="text-center py-4"
                                >

                                    <h5 class="text-muted">
                                        📦 No hay productos registrados
                                    </h5>

                                    <p class="text-muted">
                                        Comenzá agregando un nuevo producto.
                                    </p>

                                    <a
                                        href="{{ route('productos.create') }}"
                                        class="btn btn-primary"
                                    >
                                        ➕ Agregar Producto
                                    </a>

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UrbanShoes - Productos y Stock</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .banner-dashboard {
            background: linear-gradient(135deg, #0d6efd 0%, #0a58ca 100%);
            border-radius: 1rem;
        }
        .img-preview {
            width: 48px;
            height: 48px;
            object-fit: cover;
            border-radius: 8px;
        }
    </style>
</head>

<body class="bg-light">

<div class="container my-4">

    {{-- Encabezado con Estilo Dashboard --}}
    <div class="banner-dashboard p-4 text-white shadow-sm mb-4">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-3">
            <div>
                <span class="badge bg-white bg-opacity-25 text-white mb-2">Módulo de Inventario</span>
                <h2 class="fw-bold mb-1">👟 Productos y Control de Stock</h2>
                <p class="text-white-50 mb-0">
                    Administrá el catálogo, existencias e imágenes de tu tienda UrbanShoes.
                </p>
            </div>
            <!-- Botón Volver al Dashboard de Admin -->
            <a href="{{ route('dashboard') }}" class="btn btn-outline-light font-semibold px-3 py-2 shadow-sm d-flex align-items-center gap-1">
                🏠 Panel Principal
            </a>
            <a href="{{ route('productos.create') }}" class="btn btn-light text-primary fw-bold px-4 py-2 shadow-sm">
                ➕ Nuevo Producto / Stock
            </a>
        </div>
    </div>


    {{-- Mensaje de éxito --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif


    {{-- Tabla de Productos y Stock --}}
    <div class="card border-0 shadow-sm rounded-4">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th class="ps-3">ID</th>
                            <th>Imagen</th>
                            <th>Producto</th>
                            <th>Precio</th>
                            <th>Stock</th>
                            <th>Talle</th>
                            <th>Color</th>
                            <th>Categoría</th>
                            <th>Marca</th>
                            <th>Proveedor</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($productos as $producto)
                            <tr>
                                {{-- ID --}}
                                <td class="ps-3 text-muted fw-bold">
                                    #{{ $producto->id }}
                                </td>

                                {{-- Imagen --}}
                                <td>
                                    @if($producto->imagen)
                                       <img src="{{ asset('storage/' . $producto->imagen) }}" 
                                        alt="{{ $producto->nombre }}" 
                                        class="img-preview border shadow-sm"
                                        style="width: 48px; height: 48px; object-fit: cover; border-radius: 8px;">
                                    @else
                                        <div class="img-preview bg-light text-secondary d-flex align-items-center justify-content-center border fs-7 text-center">
                                            Sin foto
                                        </div>
                                    @endif
                                </td>

                                {{-- Producto --}}
                                <td>
                                    <strong class="d-block text-dark">{{ $producto->nombre }}</strong>
                                    @if($producto->descripcion)
                                        <small class="text-muted d-block text-truncate" style="max-width: 180px;">
                                            {{ $producto->descripcion }}
                                        </small>
                                    @endif
                                </td>

                                {{-- Precio --}}
                                <td class="fw-bold text-dark">
                                    ${{ number_format($producto->precio, 2, ',', '.') }}
                                </td>

                                {{-- Stock --}}
                                <td>
                                    @if(($producto->stock ?? 0) <= 5)
                                        <span class="badge bg-danger-subtle text-danger border border-danger-subtle px-2 py-1">
                                            {{ $producto->stock ?? 0 }} un.
                                        </span>
                                    @else
                                        <span class="badge bg-success-subtle text-success border border-success-subtle px-2 py-1">
                                            {{ $producto->stock }} un.
                                        </span>
                                    @endif
                                </td>

                                {{-- Talle --}}
                                <td>{{ $producto->talle ?? '—' }}</td>

                                {{-- Color --}}
                                <td>{{ $producto->color ?? '—' }}</td>

                                {{-- Categoría --}}
                                <td>
                                    @if($producto->categoria)
                                        <span class="badge bg-secondary-subtle text-secondary border">
                                            {{ $producto->categoria->nombre }}
                                        </span>
                                    @else
                                        <span class="text-muted small">—</span>
                                    @endif
                                </td>

                                {{-- Marca --}}
                                <td>
                                    {{ $producto->marca->nombre_marca ?? '—' }}
                                </td>

                                {{-- Proveedor --}}
                                <td>
                                    {{ $producto->proveedor->nombre ?? '—' }}
                                </td>

                                {{-- Acciones --}}
                                <td class="text-center pe-3">
                                    <div class="d-inline-flex gap-1">
                                        <a href="{{ route('productos.edit', $producto->id) }}" class="btn btn-sm btn-warning">
                                            ✏️
                                        </a>

                                        <form action="{{ route('productos.destroy', $producto->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Está seguro de eliminar este producto?')">
                                                🗑️️
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="11" class="text-center py-5">
                                    <h5 class="text-muted">📦 No hay productos registrados</h5>
                                    <p class="text-muted mb-3">Comenzá agregando un nuevo producto a tu inventario.</p>
                                    <a href="{{ route('productos.create') }}" class="btn btn-primary">
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
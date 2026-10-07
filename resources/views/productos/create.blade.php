<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UrbanShoes - Nuevo Producto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .banner-dashboard {
            background: linear-gradient(135deg, #0d6efd 0%, #0a58ca 100%);
            border-radius: 1rem;
        }
    </style>
</head>

<body class="bg-light">

<div class="container my-4" style="max-width: 900px;">

    {{-- Banner Superior con Estilo Dashboard --}}
    <div class="banner-dashboard p-4 text-white shadow-sm mb-4">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <span class="badge bg-white bg-opacity-25 text-white mb-2">Módulo de Inventario</span>
                <h2 class="fw-bold mb-1">👟 Registrar Nuevo Producto</h2>
                <p class="text-white-50 mb-0">Completá la información para agregar un artículo al catálogo y stock.</p>
            </div>
            <a href="{{ route('productos.index') }}" class="btn btn-light text-primary font-semibold px-3 py-2 shadow-sm">
                ⬅ Volver al listado
            </a>
        </div>
    </div>

    {{-- Errores de Validación --}}
    @if ($errors->any())
        <div class="alert alert-danger border-0 shadow-sm rounded-3 mb-4">
            <ul class="mb-0 ps-3">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Formulario --}}
    <div class="card border-0 shadow-sm rounded-4">
        <div class="card-body p-4">
            <!-- NOTA: enctype="multipart/form-data" es indispensable para subir archivos/imágenes -->
            <form action="{{ route('productos.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- Información básica --}}
                <div class="mb-3">
                    <label class="form-label fw-bold text-dark">Nombre del producto *</label>
                    <input type="text" name="nombre" value="{{ old('nombre') }}" class="form-control" placeholder="Ej: Zapatillas Nike Air Max" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold text-dark">Descripción</label>
                    <textarea name="descripcion" class="form-control" rows="2" placeholder="Detalles o características generales...">{{ old('descripcion') }}</textarea>
                </div>

                {{-- Precio, Stock, Talle y Color --}}
                <div class="row g-3 mb-3">
                    <div class="col-md-3">
                        <label class="form-label fw-bold text-dark">Precio ($) *</label>
                        <input type="number" step="0.01" name="precio" value="{{ old('precio') }}" class="form-control" placeholder="0.00" required>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label fw-bold text-dark">Stock Inicial *</label>
                        <input type="number" name="stock" value="{{ old('stock', 0) }}" class="form-control" placeholder="0" min="0" required>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label fw-bold text-dark">Talle</label>
                        <input type="text" name="talle" value="{{ old('talle') }}" class="form-control" placeholder="Ej: 42">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label fw-bold text-dark">Color</label>
                        <input type="text" name="color" value="{{ old('color') }}" class="form-control" placeholder="Ej: Negro">
                    </div>
                </div>

                {{-- Subida de Imagen --}}
                <div class="mb-4 bg-light p-3 rounded-3 border">
                    <label class="form-label fw-bold text-dark d-block">📷 Imagen del Producto</label>
                    <input type="file" name="imagen" accept="image/*" class="form-control">
                    <small class="text-muted d-block mt-1">Soporta imágenes JPG, PNG o WEBP (Máx: 2 MB).</small>
                </div>

                <hr class="my-4">

                {{-- Relaciones (Proveedor, Categoría, Marca) --}}
                <h5 class="fw-bold mb-3 text-secondary">Información Relacionada</h5>

                <div class="row g-3 mb-4">
                    <div class="col-md-4">
                        <label class="form-label fw-bold text-dark">Proveedor *</label>
                        <select name="proveedor_id" class="form-select" required>
                            <option value="" disabled selected>Seleccionar proveedor</option>
                            @foreach($proveedores as $proveedor)
                                <option value="{{ $proveedor->id }}" {{ old('proveedor_id') == $proveedor->id ? 'selected' : '' }}>
                                    {{ $proveedor->nombre }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label fw-bold text-dark">Categoría *</label>
                        <select name="categoria_id" class="form-select" required>
                            <option value="" disabled selected>Seleccionar categoría</option>
                            @foreach($categorias as $categoria)
                                <option value="{{ $categoria->id }}" {{ old('categoria_id') == $categoria->id ? 'selected' : '' }}>
                                    {{ $categoria->nombre }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label fw-bold text-dark">Marca *</label>
                        <select name="marca_id" class="form-select" required>
                            <option value="" disabled selected>Seleccionar marca</option>
                            @foreach($marcas as $marca)
                                <option value="{{ $marca->id }}" {{ old('marca_id') == $marca->id ? 'selected' : '' }}>
                                    {{ $marca->nombre_marca }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-success fw-bold px-4 py-2">
                        💾 Guardar Producto
                    </button>
                    <a href="{{ route('productos.index') }}" class="btn btn-secondary px-4 py-2">
                        Cancelar
                    </a>
                </div>
            </form>
        </div>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
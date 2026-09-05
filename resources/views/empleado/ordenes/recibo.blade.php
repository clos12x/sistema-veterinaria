@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="card shadow-lg rounded-4">
        <div class="card-body">
            <h1 class="text-center text-primary mb-4">🧾 Recibo de Venta</h1>

            <div class="mb-4 border-bottom pb-3">
                <p class="fs-5"><strong>👤 Cliente:</strong> {{ $orden->venta->cliente->name ?? 'No disponible' }}</p>
                <p class="fs-5"><strong>📅 Fecha de compra:</strong> {{ $orden->created_at->format('d/m/Y H:i') }}</p>
                <p class="fs-5">
                    <strong>📦 Tipo de entrega:</strong>
                    @if($orden->tipo_entrega === 'delivery')
                        <span class="text-success fw-semibold">🚚 Delivery</span>
                    @else
                        <span class="text-warning fw-semibold">🏥 Retiro en Veterinaria</span>
                    @endif
                </p>

                @if($orden->tipo_entrega === 'delivery' && $orden->direccion)
                    <div class="alert alert-light border mt-3">
                        <p><strong>📍 Dirección:</strong> {{ $orden->direccion->direccion }}, {{ $orden->direccion->zona }} - {{ $orden->direccion->ciudad }}</p>
                        <p><strong>🔑 Referencia:</strong> {{ $orden->direccion->referencia }}</p>
                        <p><strong>📞 Teléfono:</strong> {{ $orden->direccion->telefono }}</p>
                    </div>
                @endif
            </div>

            <div class="table-responsive">
                <table class="table table-bordered text-center align-middle">
                    <thead class="table-primary">
                        <tr>
                            <th>Producto</th>
                            <th>Precio Unitario</th>
                            <th>Cantidad</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orden->venta->detalles as $detalle)
                            <tr>
                                <td>{{ $detalle->producto->nombre ?? 'Producto eliminado' }}</td>
                                <td>Bs {{ number_format($detalle->precio_unitario ?? 0, 2) }}</td>
                                <td>{{ $detalle->cantidad }}</td>
                                <td>Bs {{ number_format(($detalle->precio_unitario ?? 0) * $detalle->cantidad, 2) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="text-end fs-4 text-primary fw-bold mt-4">
                Total: Bs {{ number_format($orden->venta->total, 2) }}
            </div>

            <div class="d-flex justify-content-between flex-wrap gap-2 mt-4">
                <a href="{{ route('empleado.ordenes.index') }}" class="btn btn-secondary rounded-pill px-4">
                    ← Volver a Órdenes
                </a>

                <a href="{{ route('empleado.ordenes.recibo.pdf', $orden->id) }}" class="btn btn-danger rounded-pill px-4">
                    📥 Descargar PDF
                </a>

                @if($orden->tipo_entrega === 'delivery')
                    <form action="{{ route('empleado.ordenes.enviarCorreo', $orden->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-primary rounded-pill px-4">
                            ✉️ Enviar correo de confirmación
                        </button>
                    </form>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection



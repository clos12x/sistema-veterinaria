@extends('layouts.app')

@section('content')
<div class="container" style="max-width: 600px; background: #fff; padding: 30px; border: 1px solid #ccc; border-radius: 10px; margin-top: 20px;">

    <h2 style="text-align: center;">🐾 Veterinaria Amiguitos</h2>
    <h3 style="text-align: center;">🧾 Ticket de Venta</h3>

    <p><strong>Fecha de Venta:</strong> {{ date('d/m/Y H:i', strtotime($venta->fecha)) }}</p>

    <hr>

    <h4>Detalle de Productos:</h4>

    <table width="100%" cellpadding="8" cellspacing="0" style="border-collapse: collapse;">
        <thead>
            <tr style="background-color: #f1f5f9;">
                <th style="border: 1px solid #ccc;">Producto</th>
                <th style="border: 1px solid #ccc;">Precio Unitario (Bs)</th>
                <th style="border: 1px solid #ccc;">Cantidad</th>
                <th style="border: 1px solid #ccc;">Subtotal (Bs)</th>
            </tr>
        </thead>
        <tbody>
            @php
                $total = 0;
            @endphp
            @foreach($venta->detalles as $detalle)
                @php
                    $subtotal = $detalle->precio_unitario * $detalle->cantidad;
                    $total += $subtotal;
                @endphp
                <tr>
                    <td style="border: 1px solid #ccc;">{{ $detalle->producto->nombre }}</td>
                    @php
                    $precioOriginal = $detalle->producto->precio;
                    $precioFinal = $detalle->precio_unitario;
                    $descuento = $precioOriginal > 0 ? 100 - ($precioFinal * 100 / $precioOriginal) : 0;
                @endphp

                <td style="border: 1px solid #ccc; text-align: right;">
                    @if($descuento > 0)
                        <span class="text-muted text-decoration-line-through">Bs {{ number_format($precioOriginal, 2) }}</span><br>
                        <span>Bs {{ number_format($precioFinal, 2) }}</span>
                    @else
                        Bs {{ number_format($precioFinal, 2) }}
                    @endif
                </td>
                    <td style="border: 1px solid #ccc; text-align: center;">{{ $detalle->cantidad }}</td>
                    <td style="border: 1px solid #ccc; text-align: right;">{{ number_format($subtotal, 2) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <hr>

    <h3 style="text-align: right;">Total Pagado: <span style="color: green;">Bs {{ number_format($total, 2) }}</span></h3>

    <div style="text-align: center; margin-top: 20px;">
        <button onclick="window.print()" style="background: #0d6efd; color: #fff; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">
            🖨️ Imprimir Ticket
        </button>

        <br><br>

        <a href="{{ route('empleado.ventas.index') }}" style="display: inline-block; background: #6c757d; color: #fff; padding: 10px 20px; border: none; border-radius: 5px; text-decoration: none;">
            ↩️ Volver a Ventas
        </a>
    </div>

</div>
@endsection

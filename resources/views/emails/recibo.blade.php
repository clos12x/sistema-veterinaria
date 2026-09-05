@component('mail::message')
# 🧾 Recibo de Compra

**💰 Total de tu pedido: Bs {{ number_format($venta->total, 2) }}**

---

@component('mail::table')
| Producto | Cantidad | Precio Unitario | Subtotal |
|----------|----------|-----------------|----------|
@php $hayDescuento = false; @endphp
@foreach($venta->detalles as $detalle)
@php
    $nombre = $detalle->producto->nombre;
    $precioOriginal = $detalle->producto->precio;
    $precioConDescuento = $detalle->precio_unitario;
    $cantidad = $detalle->cantidad;
    $subtotal = $cantidad * $precioConDescuento;
@endphp

@if($precioOriginal > $precioConDescuento)
@php $hayDescuento = true; @endphp
| **{{ $nombre }}** <br> <span style="color:red;">Bs {{ number_format($precioOriginal, 2) }}</span> → <span style="color:green;">Bs {{ number_format($precioConDescuento, 2) }}</span> | {{ $cantidad }} | Bs {{ number_format($precioConDescuento, 2) }} | Bs {{ number_format($subtotal, 2) }} |
@else
| **{{ $nombre }}** | {{ $cantidad }} | Bs {{ number_format($precioConDescuento, 2) }} | Bs {{ number_format($subtotal, 2) }} |
@endif
@endforeach
@endcomponent

@if($hayDescuento)
---
@component('mail::panel')
🎉 ¡Aprovechaste **descuentos especiales** en uno o más productos de tu compra!
@endcomponent
@endif

Gracias por confiar en nosotros.<br>
**Veterinaria Huellitas 🐾**
@endcomponent



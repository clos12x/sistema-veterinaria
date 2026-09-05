<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Tu pedido está en camino</title>
</head>
<body style="font-family: Arial, sans-serif; background: #f8f9fa; padding: 20px;">
    <div style="max-width: 600px; margin: auto; background: white; border-radius: 10px; padding: 30px; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
        <h2 style="color: #0d6efd;">Hola {{ $cliente->name }}</h2>
        <p>Te informamos que tu pedido con número de orden <strong>#{{ $orden->id }}</strong> ha sido confirmado y ya está en camino a la dirección que proporcionaste.</p>
        
        <p><strong>Fecha de envío:</strong> {{ now()->format('d/m/Y H:i') }}</p>

        @if($orden->direccion)
            <p><strong>Dirección:</strong><br>
                {{ $orden->direccion->direccion }}<br>
                {{ $orden->direccion->zona }}, {{ $orden->direccion->ciudad }}<br>
                📞 {{ $orden->direccion->telefono }}<br>
                🔑 Referencia: {{ $orden->direccion->referencia }}
            </p>
        @endif

        <p>Gracias por confiar en <strong>Veterinaria Huellitas</strong>.</p>

        <hr>
        <p style="font-size: 0.9em; color: #6c757d;">Este es un mensaje automático. Por favor, no responder a este correo.</p>
    </div>
</body>
</html>

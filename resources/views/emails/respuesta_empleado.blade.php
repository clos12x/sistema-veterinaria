@component('mail::message')
# Respuesta de {{ $nombreEmpleado }}

**Mensaje:**

{{ $respuesta }}

@if($archivoAdjunto)
> Se adjuntó un archivo con esta respuesta.
@endif

Gracias,<br>
{{ config('app.name') }}
@endcomponent


@component('mail::message')
# Mensaje del Administrador

{!! nl2br(e($mensaje)) !!}

Gracias,<br>
{{ config('app.name') }}
@endcomponent


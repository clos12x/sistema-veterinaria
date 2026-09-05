@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h3 class="mb-4 text-primary"><i class="fas fa-reply me-2"></i> Respuestas de Empleados</h3>

    @forelse($respuestas as $respuesta)
        <div class="card mb-3">
            <div class="card-body">
                <h5><i class="fas fa-user me-2"></i>{{ $respuesta->empleado->name }}</h5>
                <p class="mb-2"><strong>Mensaje original:</strong> {{ $respuesta->mensaje->asunto }}</p>
                <p class="mb-2"><strong>Respuesta:</strong> {{ $respuesta->respuesta }}</p>

                @if($respuesta->archivo)
                    <a href="{{ asset('respuestas_adjuntas/' . $respuesta->archivo) }}" target="_blank" class="btn btn-sm btn-outline-secondary">
                        <i class="fas fa-paperclip"></i> Ver Adjunto
                    </a>
                @endif

                <p class="text-muted mt-2 mb-0">
                    <i class="fas fa-clock me-1"></i> {{ $respuesta->created_at->diffForHumans() }}
                </p>
            </div>
        </div>
    @empty
        <div class="alert alert-info">No hay respuestas aún.</div>
    @endforelse
</div>
@endsection

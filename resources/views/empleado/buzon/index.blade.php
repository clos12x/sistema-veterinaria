@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h3 class="mb-4 text-primary">
        <i class="fas fa-inbox me-2"></i> Buzón de Mensajes
    </h3>

    {{-- Botón Volver al Panel --}}
    <div class="mb-4">
        <a href="{{ route('empleado.dashboard') }}" class="btn btn-outline-secondary rounded-pill">
            ← Volver al Panel
        </a>
    </div>

    @forelse($mensajes as $mensaje)
        <div class="card mb-3 border-2 {{ !$mensaje->leido ? 'border-warning' : 'border-light' }}">
            <div class="card-body">
                <h5 class="card-title">
                    {{ $mensaje->asunto }}
                    @if(!$mensaje->leido)
                        <span class="badge bg-warning text-dark">Nuevo</span>
                    @endif
                </h5>
                <p class="card-text">{{ $mensaje->mensaje }}</p>

                @if($mensaje->archivo)
                    <a href="{{ asset('mensajes_adjuntos/' . $mensaje->archivo) }}" target="_blank" class="btn btn-sm btn-outline-secondary me-2">
                        <i class="fas fa-paperclip"></i> Ver Adjunto
                    </a>
                @endif

                <p class="text-muted mt-2"><i class="fas fa-clock me-1"></i> {{ $mensaje->created_at->diffForHumans() }}</p>

                {{-- Botón para mostrar el formulario de respuesta --}}
                <button class="btn btn-sm btn-primary mt-3" onclick="toggleRespuesta({{ $mensaje->id }})">
                    <i class="fas fa-reply me-1"></i> Responder
                </button>

                {{-- Formulario oculto de respuesta --}}
                <form action="{{ route('empleado.responderMensaje') }}" method="POST" enctype="multipart/form-data" class="mt-3 d-none" id="formRespuesta-{{ $mensaje->id }}">
                    @csrf
                    <input type="hidden" name="mensaje_id" value="{{ $mensaje->id }}">

                    <div class="mb-2">
                        <textarea name="respuesta" rows="3" class="form-control" placeholder="Escribe tu respuesta..." required></textarea>
                    </div>

                    <div class="mb-2">
                        <label class="form-label">Adjuntar archivo (PDF, Word)</label>
                        <input type="file" name="archivo_respuesta" class="form-control" accept=".pdf,.doc,.docx">
                    </div>

                    <div class="text-end">
                        <button type="submit" class="btn btn-success">
                            <i class="fas fa-paper-plane me-1"></i> Enviar Respuesta
                        </button>
                    </div>
                </form>
            </div>
        </div>
    @empty
        <div class="alert alert-info">No tienes mensajes nuevos.</div>
    @endforelse
</div>

{{-- Script para mostrar/ocultar formulario --}}
<script>
    function toggleRespuesta(id) {
        const form = document.getElementById('formRespuesta-' + id);
        form.classList.toggle('d-none');
    }
</script>
@endsection


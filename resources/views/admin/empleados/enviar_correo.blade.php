@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="card shadow-lg border-0 rounded-4">
        <div class="card-header bg-primary text-white rounded-top-4">
            <h4 class="mb-0"><i class="fas fa-envelope me-2"></i>Enviar Correo a Empleado</h4>
        </div>

        <div class="card-body bg-light rounded-bottom-4">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show d-flex align-items-center" role="alert">
                    <i class="fas fa-check-circle me-2"></i>
                    <div><strong>Éxito:</strong> {{ session('success') }}</div>
                    <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert" aria-label="Cerrar"></button>
                </div>
            @endif

            <form method="POST" action="{{ route('admin.enviarCorreo.enviar') }}" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="empleado_id" class="form-label fw-semibold">Seleccionar Empleado</label>
                    <select name="empleado_id" class="form-select" required>
                        <option value="">-- Selecciona un empleado --</option>
                        @foreach($empleados as $empleado)
                            <option value="{{ $empleado->id }}">{{ $empleado->name }} ({{ $empleado->email }})</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="asunto" class="form-label fw-semibold">Asunto</label>
                    <input type="text" name="asunto" class="form-control" placeholder="Ej: Rendición de cuenta" required>
                </div>

                <div class="mb-3">
                    <label for="mensaje" class="form-label fw-semibold">Mensaje</label>
                    <textarea name="mensaje" class="form-control" rows="5" placeholder="Escribe tu mensaje aquí..." required></textarea>
                </div>

                <div class="mb-3">
                    <label for="archivo_pdf" class="form-label fw-semibold">Adjuntar archivo (PDF o Word)</label>
                    <input type="file" name="archivo_pdf" class="form-control" accept=".pdf,.doc,.docx">
                    <small class="form-text text-muted">Tamaño máximo: 2MB.</small>
                </div>

                <div class="d-flex justify-content-between align-items-center mt-4">
                    <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-secondary rounded-pill px-4">
                        ← Volver al Panel
                    </a>

                    <button type="submit" class="btn btn-success rounded-pill px-4 shadow">
                        <i class="fas fa-paper-plane me-2"></i>Enviar Correo
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

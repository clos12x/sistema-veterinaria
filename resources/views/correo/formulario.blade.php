@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card shadow-lg border-0 rounded-4">
               <div class="card-header bg-danger text-white rounded-top-4 d-flex justify-content-between align-items-center">
                <h4 class="mb-0"><i class="fas fa-envelope me-2"></i>Enviar Correo con PDF Adjunto</h4>
                <a href="{{ route('empleado.dashboard') }}" class="btn btn-light btn-sm text-danger fw-bold rounded-pill">
                 <i class="fas fa-arrow-left me-1"></i> Volver al Panel
                 </a>
                </div>

                <div class="card-body bg-light rounded-bottom-4">

                    @if(session('success'))
                        <div class="alert alert-success">
                            <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('correo.enviar') }}" enctype="multipart/form-data" class="needs-validation" novalidate>
                        @csrf

                        <div class="mb-3">
                            <label for="email" class="form-label fw-bold">Correo destinatario:</label>
                            <input type="email" class="form-control rounded-3" id="email" name="email" required placeholder="ejemplo@correo.com">
                            <div class="invalid-feedback">Por favor, introduce un correo válido.</div>
                        </div>

                        <div class="mb-3">
                            <label for="asunto" class="form-label fw-bold">Asunto:</label>
                            <input type="text" class="form-control rounded-3" id="asunto" name="asunto" required placeholder="Asunto del correo">
                            <div class="invalid-feedback">El asunto es obligatorio.</div>
                        </div>

                        <div class="mb-3">
                            <label for="mensaje" class="form-label fw-bold">Mensaje:</label>
                            <textarea class="form-control rounded-3" id="mensaje" name="mensaje" rows="4" required placeholder="Escribe tu mensaje..."></textarea>
                            <div class="invalid-feedback">El mensaje no puede estar vacío.</div>
                        </div>

                        <div class="mb-4">
                            <label for="archivo_pdf" class="form-label fw-bold">Adjuntar PDF:</label>
                            <input type="file" class="form-control rounded-3" id="archivo_pdf" name="archivo_pdf" accept="application/pdf" required>
                            <div class="form-text">Solo se aceptan archivos en formato PDF.</div>
                            <div class="invalid-feedback">Debe seleccionar un archivo PDF.</div>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-danger btn-lg rounded-3">
                                <i class="fas fa-paper-plane me-2"></i>Enviar PDF
                            </button>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>
</div>

{{-- Validación de Bootstrap --}}
<script>
    (() => {
        'use strict';
        const forms = document.querySelectorAll('.needs-validation');
        Array.from(forms).forEach(form => {
            form.addEventListener('submit', event => {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });
    })();
</script>
@endsection

<?php

namespace App\Http\Controllers\Empleado;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OrdenEnvio;
use App\Models\Venta;
use App\Models\DetalleVenta;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Mail;
use App\Mail\ProductoEnCamino;

class OrdenEnvioController extends Controller
{
    public function index()
    {
        $ordenes = OrdenEnvio::with(['venta.cliente', 'direccion'])
                    ->orderBy('created_at', 'desc')
                    ->get();

        return view('empleado.ordenes.index', compact('ordenes'));
    }

    public function actualizarEstado(Request $request, $id)
    {
        $request->validate([
            'estado' => 'required|in:pendiente,en camino,entregado',
        ]);

        $orden = OrdenEnvio::findOrFail($id);
        $orden->estado = $request->estado;
        $orden->save();

        return back()->with('success', 'Estado actualizado correctamente.');
    }

    public function verRecibo($id)
    {
        $orden = OrdenEnvio::with([
            'venta.detalles.producto',
            'venta.cliente',
            'direccion' // relación con direccion_envio_id
        ])->findOrFail($id);

        return view('empleado.ordenes.recibo', compact('orden'));
    }

    public function descargarReciboPDF($id)
    {
        $orden = OrdenEnvio::with([
            'venta.detalles.producto',
            'venta.cliente',
            'direccion'
        ])->findOrFail($id);

        $pdf = Pdf::loadView('empleado.ordenes.recibo_pdf', compact('orden'));
        return $pdf->download('Recibo_Orden_' . $orden->id . '.pdf');
    }

    // ✅ Nuevo método para enviar correo solo si es delivery
    public function enviarCorreo($id)
    {
        $orden = OrdenEnvio::with('venta.cliente')->findOrFail($id);

        // Verifica si es delivery
        if ($orden->tipo_entrega !== 'delivery') {
            return back()->with('error', 'Este tipo de entrega no requiere envío de correo.');
        }

        $cliente = $orden->venta->cliente;

        if ($cliente && $cliente->email) {
            Mail::to($cliente->email)->send(new ProductoEnCamino($cliente, $orden));
        }

        return back()->with('success', 'Correo enviado correctamente al cliente.');
    }
}

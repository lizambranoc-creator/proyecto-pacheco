<?php

namespace App\Http\Controllers;

use App\Models\Factura;
use App\Models\Cliente;
use App\Models\Producto;
use App\Models\DetalleFactura;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FacturaController extends Controller
{
    public function index()
    {
        $facturas = Factura::with(['cliente', 'detalles.producto', 'pagos'])->latest()->get();
        return view('facturas.index', compact('facturas'));
    }

    public function create()
    {
        $clientes = Cliente::all();
        $productos = Producto::all();
        return view('facturas.create', compact('clientes', 'productos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'fecha' => 'required|date',
            'productos' => 'required|array|min:1',
            'productos.*.producto_id' => 'required|exists:productos,id',
            'productos.*.cantidad' => 'required|integer|min:1',
            'productos.*.precio_unitario' => 'required|numeric|min:0',
        ]);

        DB::transaction(function () use ($request) {
            $totalFactura = 0;

            // 1. Crear la Factura
            $factura = Factura::create([
                'cliente_id' => $request->cliente_id,
                'fecha' => $request->fecha,
                'total' => 0,
            ]);

            // 2. Guardar en la tabla intermedia detalle_facturas
            foreach ($request->productos as $item) {
                $subtotal = $item['cantidad'] * $item['precio_unitario'];
                $totalFactura += $subtotal;

                DetalleFactura::create([
                    'factura_id' => $factura->id,
                    'producto_id' => $item['producto_id'],
                    'cantidad' => $item['cantidad'],
                    'precio_unitario' => $item['precio_unitario'],
                    'subtotal' => $subtotal,
                ]);
            }

            // 3. Actualizar el total de la factura
            $factura->update(['total' => $totalFactura]);
        });

        return redirect()->route('facturas.index')->with('success', 'Factura creada exitosamente con sus detalles.');
    }
}
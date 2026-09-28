<?php

namespace App\Http\Controllers;

use App\Models\Pago;
use App\Models\Factura;
use App\Models\MetodoPago;
use Illuminate\Http\Request;

class PagoController extends Controller
{
    /**
     * Muestra la lista de pagos.
     */
    public function index()
    {
        $pagos = Pago::with(['factura', 'metodoPago'])->latest()->get();
        return view('pagos.index', compact('pagos'));
    }

    /**
     * Muestra el formulario para crear un nuevo pago.
     */
    public function create()
    {
        $facturas = Factura::all();
        $metodosPago = MetodoPago::all();
        return view('pagos.create', compact('facturas', 'metodosPago'));
    }

    /**
     * Guarda un nuevo pago en la base de datos.
     */
    public function store(Request $request)
    {
        $request->validate([
            'factura_id' => 'required|exists:facturas,id',
            'metodo_pago_id' => 'required|exists:metodo_pagos,id',
            'monto' => 'required|numeric|min:0.01',
            'fecha_pago' => 'required|date',
        ]);

        Pago::create($request->all());

        return redirect()->route('pagos.index')->with('success', 'Pago registrado exitosamente.');
    }
}
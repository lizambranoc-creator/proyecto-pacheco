<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cliente;
use App\Models\Producto;
use App\Models\MetodoPago;
use App\Models\Factura;
use App\Models\DetalleFactura;
use App\Models\Pago;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {

        $cliente1 = Cliente::create([
            'nombre' => 'Carlos Mendoza',
            'email' => 'carlos@example.com',
            'telefono' => '3001234567',
            'especialidad' => 'Desarrollo Web',
        ]);

        $cliente2 = Cliente::create([
            'nombre' => 'Ana Gómez',
            'email' => 'ana@example.com',
            'telefono' => '3109876543',
            'especialidad' => 'Diseño UI/UX',
        ]);

        
        $prod1 = Producto::create([
            'nombre' => 'Licencia Software Laravel Pro',
            'descripcion' => 'Licencia anual para desarrollo empresarial',
            'precio' => 150.00,
            'stock' => 20,
        ]);

        $prod2 = Producto::create([
            'nombre' => 'Hosting VPS Senior',
            'descripcion' => 'Servidor dedicado SSD 16GB RAM',
            'precio' => 80.00,
            'stock' => 50,
        ]);

    
        $metodoEfectivo = MetodoPago::create([
            'nombre' => 'Efectivo',
            'estado' => 'Activo',
        ]);

        $metodoTarjeta = MetodoPago::create([
            'nombre' => 'Tarjeta de Crédito',
            'estado' => 'Activo',
        ]);

        $metodoTransf = MetodoPago::create([
            'nombre' => 'Transferencia Bancaria',
            'estado' => 'Activo',
        ]);

    
        $factura1 = Factura::create([
            'cliente_id' => $cliente1->id,
            'fecha' => now()->subDays(5)->toDateString(),
            'total' => 230.00,
        ]);

        $factura2 = Factura::create([
            'cliente_id' => $cliente2->id,
            'fecha' => now()->toDateString(),
            'total' => 150.00,
        ]);

        
        DetalleFactura::create([
            'factura_id' => $factura1->id,
            'producto_id' => $prod1->id,
            'cantidad' => 1,
            'precio_unitario' => 150.00,
            'subtotal' => 150.00,
        ]);

        DetalleFactura::create([
            'factura_id' => $factura1->id,
            'producto_id' => $prod2->id,
            'cantidad' => 1,
            'precio_unitario' => 80.00,
            'subtotal' => 80.00,
        ]);

        DetalleFactura::create([
            'factura_id' => $factura2->id,
            'producto_id' => $prod1->id,
            'cantidad' => 1,
            'precio_unitario' => 150.00,
            'subtotal' => 150.00,
        ]);

    
        Pago::create([
            'factura_id' => $factura1->id,
            'metodo_pago_id' => $metodoTarjeta->id,
            'monto' => 230.00,
            'fecha_pago' => now()->subDays(4)->toDateString(),
        ]);

        Pago::create([
            'factura_id' => $factura2->id,
            'metodo_pago_id' => $metodoTransf->id,
            'monto' => 150.00,
            'fecha_pago' => now()->toDateString(),
        ]);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    use HasFactory;

    protected $table = 'facturas';

    protected $fillable = [
        'cliente_id',
        'fecha',
        'total',
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function detalles()
    {
        return $this->hasMany(DetalleFactura::class);
    }

    public function pagos()
    {
        return $this->hasMany(Pago::class);
    }

    // Acceso directo a los productos a través de la tabla intermedia
    public function productos()
    {
        return $this->belongsToMany(Producto::class, 'detalle_facturas')
                    ->withPivot('cantidad', 'precio_unitario', 'subtotal')
                    ->withTimestamps();
    }
}
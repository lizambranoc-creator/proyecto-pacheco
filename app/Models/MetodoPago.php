<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MetodoPago extends Model
{
    use HasFactory;

    protected $table = 'metodo_pagos';

    protected $fillable = [
        'nombre',
        'estado',
    ];

    public function pagos()
    {
        return $this->hasMany(Pago::class);
    }
}
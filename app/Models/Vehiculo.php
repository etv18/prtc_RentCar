<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    use HasFactory;

    protected $fillable = [
        'marca',
        'modelo',
        'color',
        'ano_creacion',
        'gama_id',
    ];

    public function gamas()
    {
        return $this->belongsTo(Gama::class, 'gama_id');
    }

    public function detalle_facturas()
    {
        return $this->belongsTo(Detalle_Factura::class, 'id');
    }
}

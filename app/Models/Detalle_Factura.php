<?php

namespace App\Models;

use GuzzleHttp\Client;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detalle_Factura extends Model
{
    use HasFactory;

    protected $fillable = [
        'factura_id',
        'vehiculo_id',
        'fecha_incio',
        'fecha_fin',
        'cantidad_dias',
        'total_vehiculo',
    ];

    public function factura()
    {
        return $this->belongsTo(Factura::class, 'id');
    }

    public function vehiculos()
    {
        return $this->hasMany(Vehiculo::class, 'id');
    }
}

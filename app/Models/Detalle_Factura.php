<?php

namespace App\Models;

use GuzzleHttp\Client;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detalle_Factura extends Model
{
    use HasFactory;

    protected $fillable = [];

    public function factura()
    {
        return $this->belongsTo(Factura::class, 'id');
    }

    public function vehiculos()
    {
        return $this->belongsTo(Vehiculo::class, 'id');
    }
}

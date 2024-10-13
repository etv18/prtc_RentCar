<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gama extends Model
{
    use HasFactory;

    protected $fillable = [];

    public function vehiculos()
    {
        return $this->hasMany(Vehiculo::class, 'id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    use HasFactory;

    public $fillable = [
        'user_id',
        'cliente_id',
        'total',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'id');
    }
}

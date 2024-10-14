<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Factura;
use App\Models\Vehiculo;


return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('detalle__facturas', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Factura::class)->constrained()->onDelete('cascade');
            $table->foreignIdFor(Vehiculo::class)->constrained()->onDelete('cascade');
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->integer('cantidad_dias');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalle__facturas');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('factura_compra', function (Blueprint $table) {
            $table->id();
            $table->decimal('descuento', $precision = 8, $scale = 2);
            $table->decimal('impuesto', $precision = 8, $scale = 2);
            $table->unsignedBigInteger('pedido_compra_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('factura_compra');
    }
};

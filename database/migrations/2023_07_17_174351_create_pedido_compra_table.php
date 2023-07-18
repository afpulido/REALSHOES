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
        Schema::create('pedido_compra', function (Blueprint $table) {
            $table->id();
            $table->integer('cantidad');
            $table->decimal('valor_total', $precision = 8, $scale = 2);
            $table->unsignedBigInteger('metodo_pago_id');
            $table->unsignedBigInteger('empleado_producto_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pedido_compra');
    }
};

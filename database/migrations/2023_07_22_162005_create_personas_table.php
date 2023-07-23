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
        Schema::create('personas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('users_id')->nullable();
            $table->integer('personas_id')->nullable();
            $table->string('name');     
            $table->string('apellidos')->nullable();
            $table->string('direccion')->nullable();
            $table->integer('telefono')->nullable();
            $table->unsignedBigInteger('tipo_doc_id')->nullable();
            $table->unsignedBigInteger('rol_id')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personas');
    }
};

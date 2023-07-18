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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');     
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->integer('persona_id')->nullable();;
            $table->string('apellidos')->nullable();;
            $table->string('direccion')->nullable();;
            $table->integer('telefono')->nullable();;
            $table->unsignedBigInteger('tipo_doc_id')->nullable();;
            $table->unsignedBigInteger('rol_id')->nullable();;

        /**
         * ->nullable();=null
         * 
        * $table->id();
        *   $table->integer('persona_id');
        *  $table->string('name');
        * $table->string('apellidos');
        *   $table->string('direccion');
        *   $table->integer('telefono');
        *    $table->string('email')->unique();
        *   $table->timestamp('email_verified_at')->nullable();
        *   $table->string('password');
        *   $table->unsignedBigInteger('tipo_doc_id');
        *   $table->unsignedBigInteger('rol_id');
        *   $table->rememberToken();
        *   $table->timestamps();
        *
        */


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};

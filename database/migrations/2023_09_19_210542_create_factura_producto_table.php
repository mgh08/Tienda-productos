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
        Schema::create('factura_producto', function (Blueprint $table) {
            $table->id();
            $table->integer('cantidad');
            $table->integer('precio');
            $table->foreignId('producto_id')->constrained('productos');
            $table->foreignId('factura_id')->constrained('facturas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('factura_producto');
    }
};

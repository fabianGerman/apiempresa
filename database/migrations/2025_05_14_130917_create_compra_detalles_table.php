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
        Schema::create('compra_detalles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('compdet_stock');
            $table->foreign('compdet_stock')->references('id')->on('stocks')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('compdet_proveedor');
            $table->foreign('compdet_proveedor')->references('id')->on('proveedors')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('compdet_cantidad')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('compra_detalles');
    }
};

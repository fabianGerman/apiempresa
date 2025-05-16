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
        Schema::create('compras', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('comp_detcomp');
            $table->foreign('comp_detcomp')->references('id')->on('compra_detalles')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('comp_impuesto');
            $table->foreign('comp_impuesto')->references('id')->on('impuestos')->onUpdate('cascade')->onDelete('cascade');
            $table->string('comp_tipopago')->nullable();
            $table->integer('comp_cantidadcomprada')->nullable();
            $table->double('comp_subtotal')->nullable();
            $table->double('comp_total')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('compras');
    }
};

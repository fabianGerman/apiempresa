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
        Schema::create('precios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('prec_producto');
            $table->foreign('prec_producto')->references('id')->on('productos')->onUpdate('cascade')->onDelete('cascade');
            $table->double('prec_costo')->nullable();
            $table->double('prec_unitario')->nullable();
            $table->double('prec_total')->nullable();   
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('precios');
    }
};

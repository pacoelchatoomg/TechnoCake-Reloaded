<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('price');
            $table->string('product_code')->unique();
            $table->string('description');
            $table->boolean('disponible');
            $table->unsignedBigInteger('inventory_id')->nullable();
            $table->unsignedBigInteger('pedido_id')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('inventory_id')->references('id')->on('inventories')->onDelete('cascade');
            $table->foreign('pedido_id')->references('id')->on('pedidos')->onDelete('cascade');
        });
    }
    public function down(): void
    {
        Schema::table('productos', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
};

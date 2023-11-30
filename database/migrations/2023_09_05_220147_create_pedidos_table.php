<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('Pedidos', function (Blueprint $table) {
            $table->softDeletes();
            $table->id();
            $table->integer('amount');
            $table->float('price');
            $table->string('status');
            $table->string('description');
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::table('Pedidos', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
};

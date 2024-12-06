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
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();

            $table->dateTime("fecha");
            $table->text("detalle")->nullable();
            $table->boolean("estado")->default(true);
            $table->text("observacion")->nullable();

            // N:1
            $table->bigInteger("cliente_id")->unsigned();
            $table->foreign("cliente_id")->references("id")->on("clientes");            

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pedidos');
    }
};
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
        Schema::create('revisioncas', function (Blueprint $table) {
            $table->id();
            $table->string('ruta');
            $table->string('codigo');
            $table->string('lecturaan');//lectura anterior
            $table->string('consumoan');// consumo anterior
            $table->string('lecturaac');//lectura actual
            $table->string('consumoac');// consumo actual
            $table->string('promedio');// 
            $table->string('causadenol')->nullable();// consumo de no lectura
            $table->string('nombre');
            $table->string('estrato');
            $table->string('direccion');
            $table->string('nmedidor')->nullable();//numero medidor
            $table->string('estado');//numero medidor
            $table->string('observacion')->default('');//numero medidor
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('revisioncas');
    }
};

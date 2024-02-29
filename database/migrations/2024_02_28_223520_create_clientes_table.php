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
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->enum('tipoaforo', [1,2])->default(1); 
            $table->enum('tiporesiduos', [1,2])->default(1); 
            $table->string('nombre');
            $table->string('codigousuario');
            $table->string('direccion');
            $table->string('telefono');
            $table->string('correo');
            $table->string('nombrerl');
            $table->enum('estado', [1,2])->default(1); 

            //relaciones                      
            $table->unsignedBigInteger('actividade_id');
            $table->unsignedBigInteger('ruta_id');
            $table->unsignedBigInteger('category_id');

            $table->foreign('actividade_id')->references('id')->on('actividades')->onDelete('cascade'); 
            $table->foreign('ruta_id')->references('id')->on('rutas')->onDelete('cascade'); 
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade'); 


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};

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
        Schema::create('recipientedetalles', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion');
            $table->string('dimensiones');
            $table->float('equivalencia', 8, 4);

            //relaciones            
            $table->unsignedBigInteger('recipiente_id');

            $table->foreign('recipiente_id')->references('id')->on('recipientes')->onDelete('cascade'); 

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recipientedetalles');
    }
};

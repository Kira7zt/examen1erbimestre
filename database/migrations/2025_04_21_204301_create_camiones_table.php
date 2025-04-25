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
    Schema::create('camiones', function (Blueprint $table) {
        $table->id();
        $table->string('placa');
        $table->string('modelo')->nullable();
        $table->integer('capacidad')->nullable();

        // Clave foránea a empresas
        $table->unsignedBigInteger('empresa_id');
        $table->foreign('empresa_id')->references('id')->on('empresas')->onDelete('cascade');

        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
{
    Schema::dropIfExists('camiones'); // <-- Aquí estaba el error
}

};

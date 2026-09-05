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
       Schema::create('respuestas', function (Blueprint $table) {
    $table->id();
    $table->unsignedBigInteger('mensaje_id');
    $table->unsignedBigInteger('empleado_id');
    $table->text('respuesta');
    $table->string('archivo')->nullable();
    $table->timestamps();

    $table->foreign('mensaje_id')->references('id')->on('mensajes')->onDelete('cascade');
    $table->foreign('empleado_id')->references('id')->on('users')->onDelete('cascade');
});
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('respuestas');
    }
};

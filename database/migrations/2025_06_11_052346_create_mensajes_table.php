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
        Schema::create('mensajes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('empleado_id'); // destinatario del mensaje
            $table->string('asunto');
            $table->text('mensaje');
            $table->string('archivo')->nullable(); // nombre del archivo adjunto
            $table->boolean('leido')->default(false); // marca si el mensaje fue leído o no
            $table->timestamps();

            // Clave foránea
            $table->foreign('empleado_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mensajes');
    }
};


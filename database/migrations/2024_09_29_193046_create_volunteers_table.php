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
        Schema::create('volunteers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->unique();
            $table->date('birthdate'); // Fecha de nacimiento
            $table->string('gender'); // Género
            $table->string('address'); // Dirección
            $table->string('phone'); // Número de teléfono
            $table->enum('education', [ // Nivel de educación
                'Sin educación formal',
                'Primaria',
                'Secundaria',
                'Preparatoria',
                'Educación superior',
                'Otro'
            ]);
            $table->string('ine_document'); // Documento INE/DNI
            $table->integer('status')->default(2);// Estado del voluntario
            $table->timestamps();

            // Llave foránea
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('volunteers');
    }
};

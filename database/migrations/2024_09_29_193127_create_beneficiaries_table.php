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
        Schema::create('beneficiaries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->unique();
            $table->date('birthdate');
            $table->enum('gender', ['male', 'female', 'other'])->nullable();
            $table->enum('education_level', ['sineducaciónformal', 'primaria', 'secundaria', 'preparatoria', 'licenciatura', 'other'])->nullable();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('guardian_email')->unique()->nullable();
            $table->string('guardian_ine')->nullable();
            $table->enum('kinship', ['father', 'mother', 'tutor', 'other'])->nullable();
            $table->integer('status');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('beneficiaries');
    }
};

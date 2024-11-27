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
        Schema::create('programs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('short_description');
            $table->text('description');
            $table->enum('category', ['educativo', 'económico', 'caritativo', 'inclusivo', 'capacitación', 'otro']);
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->decimal('latitude', 10, 8)->nullable();
            $table->decimal('longitude', 11, 8)->nullable();
            $table->string('place')->nullable();
            $table->enum('modality', ['presencial', 'en línea']);
            $table->string('meeting_link')->nullable();
            $table->json('days_of_the_week')->nullable();
            $table->string('schedule');
            $table->string('age');
            $table->unsignedInteger('beneficiary_capacity');
            $table->unsignedInteger('volunteer_capacity');
            $table->text('objetive');
            $table->json('contents')->nullable();
            $table->text('financing')->nullable();
            $table->string('img');
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();
            $table->integer('status')->default(2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('programs');
    }
};
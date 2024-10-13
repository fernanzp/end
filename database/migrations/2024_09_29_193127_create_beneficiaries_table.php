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
            $table->enum('gender', ['male', 'female', 'other']);
            $table->string('education_level');
            $table->string('address');
            $table->string('phone');
            $table->string('guardian_email')->unique();
            $table->string('guardian_ine');
            $table->string('kinship');
            $table->integer('status');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::create('donations', function (Blueprint $table) {
            $table->id();
            $table->string('payer_email');
            $table->string('payer_name');
            $table->string('payer_surname');
            $table->string('status');
            $table->string('payer_id');
            $table->string('create_time');
            $table->string('update_time');
            $table->decimal('amount', 10, 2);
            $table->string('currency');
            $table->string('transaction_id');
            $table->timestamps();
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

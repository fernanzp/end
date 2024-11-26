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
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('outgoing_msg_id');
            $table->unsignedBigInteger('incoming_msg_id');
            $table->boolean('is_read')->default(false);
            $table->text('msg');
            $table->timestamps();

            $table->foreign('outgoing_msg_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('incoming_msg_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('messages');
    }
};

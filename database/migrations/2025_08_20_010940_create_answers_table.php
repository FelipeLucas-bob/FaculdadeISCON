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
        Schema::create('answers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('proof_id');
            $table->unsignedBigInteger('question_id');
            $table->char('answer', 1)->nullable(); // 'A', 'B', 'C' or 'D'
            $table->boolean('correct')->default(false);
            $table->timestamps();
            $table->foreign('proof_id')->references('id')->on('proofs')->onDelete('cascade');
            $table->foreign('question_id')->references('id')->on('questions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('answers');
    }
};

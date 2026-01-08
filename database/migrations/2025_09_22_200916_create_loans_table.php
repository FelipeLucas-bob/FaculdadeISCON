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
        Schema::create('loans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('author_id');
            $table->unsignedBigInteger('book_item_id');
            $table->unsignedBigInteger('user_id');
            $table->date('loan_date'); // Data do empréstimo
            $table->date('due_date'); // Data prevista para devolução
            $table->unsignedBigInteger('author_id_return')->nullable();
            $table->date('return_date')->nullable(); // Data da devolução real (se houver)            
            // Status: 0 = ativo, 1 = devolvido, 2 = atrasado
            $table->tinyInteger('status')->default(0);
            $table->text('observation')->nullable(); 
            $table->timestamps();
            $table->foreign('author_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('author_id_return')->references('id')->on('users')->onDelete('cascade');
            // $table->foreign('book_item_id')->references('id')->on('book_items')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loans');
    }
};

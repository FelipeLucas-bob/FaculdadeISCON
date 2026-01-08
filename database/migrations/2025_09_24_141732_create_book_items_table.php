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
        Schema::create('book_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('book_id'); // referência para o livro "mãe"
            $table->string('code_system')->unique(); // código único (ex: etiqueta, código de barras)
            $table->string('code_library'); // código da bibioteca (ex: etiqueta, código de barras)
            $table->string('status')->default('available'); // status do item (ex: disponível, emprestado, reservado, perdido)
            $table->timestamps();

            $table->foreign('book_id')->references('id')->on('books')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('book_items');
    }
};

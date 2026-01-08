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
        Schema::create('collections', function (Blueprint $table) {
            $table->id();

            // Relacionamentos
            // $table->unsignedBigInteger('book_id');       // referência ao livro cadastrado
            // Informações do exemplar
            $table->string('code')->unique();            // código de tombamento / patrimônio
            $table->string('edition')->nullable();       // edição do exemplar
            $table->year('publication_year')->nullable(); // ano de publicação
            $table->string('location')->nullable();      // localização física (estante, prateleira)
            $table->string('status')->nullable(); // situação do exemplar

            // Controle de aquisição
            $table->date('acquired_at')->nullable();     // data de aquisição do exemplar
            $table->decimal('price', 10, 2)->nullable(); // valor de aquisição (se registrado)

            $table->timestamps();

            // Chaves estrangeiras
            // $table->foreign('book_id')->references('id')->on('books')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('collections');
    }
};

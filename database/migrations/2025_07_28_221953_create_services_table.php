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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('author_id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('status')->default('Pendente'); // Resolvido, Pendente, etc.
            $table->string('student_name');                // Nome do aluno
            $table->string('email')->nullable();           // Email do aluno
            $table->string('phone')->nullable();           // Telefone fixo
            $table->string('whatsapp')->nullable();        // WhatsApp
            $table->unsignedBigInteger('category_id');     // Categoria (FK)
            $table->unsignedBigInteger('demand');          // Tipo de atendimento/demanda
            $table->text('request');                       // Requisição do aluno
            $table->text('procedure')->nullable();         // Procedimento realizado
            $table->timestamps();

            // Chaves estrangeiras (opcional, se existir tabela categories e types)
            // $table->foreign('category_id')->references('id')->on('categorys')->onDelete('cascade');
            // $table->foreign('demand')->references('id')->on('types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};

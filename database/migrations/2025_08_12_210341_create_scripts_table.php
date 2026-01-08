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
        Schema::create('scripts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('author_id');
            $table->unsignedBigInteger('sector_id')->nullable(); // setor relacionado (chave estrangeira)
            $table->unsignedBigInteger('category_id')->nullable(); // categoria relacionada (chave estrangeira)
            $table->string('type'); // tipo do script 
            $table->string('title'); // título do script/procedimento
            $table->text('content'); // conteúdo do script, texto detalhado
            $table->text('observation')->nullable()->comment('Observações adicionais sobre o script');
            $table->string('version')->nullable(); // versão do script, ex: "1.0"
            // $table->date('date_script')->nullable(); // data do script
            // $table->date('last_update')->nullable(); // data da última atualização
            $table->timestamps();

            // Chave estrangeira para setores (assumindo que tabela sectors existe)
            $table->foreign('author_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('sector_id')->references('id')->on('sectors')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categorys')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scripts');
    }
};

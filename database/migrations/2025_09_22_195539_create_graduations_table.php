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
        Schema::create('graduations', function (Blueprint $table) {
            $table->id();
            // Relacionamentos
            $table->unsignedBigInteger('student_id'); // aluno que se formou
            $table->unsignedBigInteger('course_id');  // curso concluído
            // Dados do processo de diplomação
            $table->date('conclusion_date')->nullable(); // data de conclusão do curso
            $table->date('request_date')->nullable();    // data de solicitação do diploma
            $table->date('issue_date')->nullable();      // data de emissão do diploma
            $table->string('diploma_number')->nullable(); // número de controle do diploma
            $table->string('status')->nullable(); // status do processo
            $table->timestamps();

            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('graduations');
    }
};

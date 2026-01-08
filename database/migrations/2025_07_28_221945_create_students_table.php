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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('author_id');
            $table->unsignedBigInteger('user_id');

            // New fields
            $table->string('registration_number_sei')->nullable(); // Número da matrícula do sei
            $table->string('full_name'); // Nome completo (sem abreviações e acentos)
            $table->date('birth_date')->nullable(); // Data de nascimento (YYYY-MM-DD)
            $table->string('cpf', 14)->unique(); // CPF
            $table->string('rg')->nullable(); // CPF
            $table->string('mother_or_guardian_name')->nullable(); // Nome da mãe ou responsável
            $table->string('enrolled_course')->nullable(); // Nome do curso matriculado
            $table->string('education_level')->nullable(); // Nível de ensino
            $table->string('modality')->nullable(); // Modalidade
            $table->date('start_date')->nullable(); // Data inicial (período letivo)
            $table->date('end_date')->nullable();   // Data final (período letivo)

            $table->timestamps();

            // Foreign Keys
            $table->foreign('author_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};

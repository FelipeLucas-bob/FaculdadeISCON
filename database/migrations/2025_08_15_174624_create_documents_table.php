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
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('author_id');
            $table->string('document_type'); // CPF, RG, Diploma, etc.
            $table->enum('gender', ['MALE', 'FEMALE', 'BOTH'])->default('BOTH');
            $table->string('marital_status');
            $table->boolean('foreigner');
            $table->string('age_min_max');
            $table->boolean('transfer');;
            $table->boolean('foreign_diploma');
            $table->boolean('selection_process');
            $table->boolean('mandatory_each_renewal');
            $table->boolean('reopening');
            $table->boolean('mandatory_document');
            $table->boolean('prevent_enrollment_renewal');
            $table->timestamp('course_inclusion_date');
            $table->timestamps();

            $table->foreign('author_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documents');
    }
};

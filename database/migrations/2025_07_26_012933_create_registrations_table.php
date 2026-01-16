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
        Schema::create('registrations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('author_id');
            $table->unsignedBigInteger('user_id');
            $table->string('phone');
            $table->string('telephone');
            $table->string('whatsapp');
            $table->string('course');
            $table->string('education');
            $table->string('shift');
            $table->string('motivation');
            $table->string('admission_type');
            $table->boolean('terms');
            $table->timestamps();
            $table->foreign('author_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registrations');
    }
};

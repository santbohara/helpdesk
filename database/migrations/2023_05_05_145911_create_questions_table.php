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
        Schema::create('questions', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('topic_id')->index('topic_id');
            $table->text('title');
            $table->text('title_unicode');
            $table->text('slug');
            $table->longText('answer')->nullable();;
            $table->boolean('active');
            $table->integer('order')->nullable();
            $table->integer('views')->default('0');
            $table->string('created_by');
            $table->timestamps();

            $table->foreign('topic_id')->references('id')->on('topics')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questions');
    }
};

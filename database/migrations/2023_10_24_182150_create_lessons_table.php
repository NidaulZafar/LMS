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
        Schema::create('lessons', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('course_id'); // Add a foreign key to link to the course
            $table->string('title'); // Add a column for the lesson title
            $table->text('content')->nullable(); // Add a column for the lesson content
            $table->string('video_url')->nullable(); // Add a column for the video URL
            $table->integer('duration')->nullable(); // Add a column for lesson duration
            $table->timestamps();

            // Define the foreign key constraint
            $table->foreign('course_id')
                ->references('id')
                ->on('courses')
                ->onDelete('cascade'); // Define the action on deletion (e.g., cascade)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lessons');
    }
};

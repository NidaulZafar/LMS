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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Add a column for the course title
            $table->text('description')->nullable(); // Add a column for the course description
            $table->string('cover_image')->nullable(); // Add a column for the course cover image
            $table->unsignedBigInteger('instructor_id'); // Add a foreign key to link to the instructor (user)
            $table->timestamps();

            // Define the foreign key constraint
            $table->foreign('instructor_id')
                ->references('id')
                ->on('instructors')
                ->onDelete('cascade'); // Define the action on deletion (e.g., cascade)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};

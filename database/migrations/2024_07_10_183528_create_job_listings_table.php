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
        Schema::create('job_listings', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('employer_id');
                $table->string('title');
                $table->text('description');
                $table->string('location');
                $table->string('skill');
                $table->string('experience');
                $table->decimal('salary', 10, 2)->nullable();
                $table->string('status')->default('active')->comment('active, inactive');
                $table->string('employment_type'); // e.g., Full-time, Part-time
                $table->timestamps();
    
                // Foreign key constraint
                $table->foreign('employer_id')->references('id')->on('employers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_listings');
    }
};

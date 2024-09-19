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
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('jobseeker_id');
            $table->unsignedBigInteger('job_listing_id');
            $table->string('resume')->nullable();
            $table->text('cover_letter')->nullable();
            $table->timestamps();
            $table->string('job_status')->default('pending')->comment('pending,interview ,accepted, rejected');
            $table->foreign('jobseeker_id')->references('id')->on('job_seekers')->onDelete('cascade');
            $table->foreign('job_listing_id')->references('id')->on('job_listings')->onDelete('cascade');
        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};

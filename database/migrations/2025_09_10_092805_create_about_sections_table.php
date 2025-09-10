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
        Schema::create('about_sections', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('short_description');
            $table->longText('full_description');
            $table->json('skills')->nullable();
            $table->json('specializations')->nullable();
            $table->integer('years_of_experience')->nullable();
            $table->integer('projects_completed')->nullable();
            $table->integer('happy_clients')->nullable();
            $table->string('cv_file_url')->nullable();
            $table->boolean('is_active')->default(true);
            $table->integer('priority')->default(0);
            $table->foreignId('profile_image_id')->nullable()->constrained('media')->onDelete('set null');
            $table->timestamps();

            $table->index(['is_active', 'priority']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_sections');
    }
};

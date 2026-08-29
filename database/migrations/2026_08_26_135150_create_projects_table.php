<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
    public function up(): void {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sector_id')->nullable()->constrained()->nullOnDelete();
            $table->json('title');
            $table->json('slug');
            $table->json('location')->nullable();
            $table->json('scope')->nullable();
            $table->json('materials')->nullable();
            $table->json('surface_areas')->nullable();
            $table->json('constraints')->nullable();
            $table->json('solution')->nullable();
            $table->json('results')->nullable();
            $table->string('main_image')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->timestamp('published_at')->nullable();
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('projects'); }
};
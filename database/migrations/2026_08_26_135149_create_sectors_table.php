<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
    public function up(): void {
        Schema::create('sectors', function (Blueprint $table) {
            $table->id();
            $table->json('title');
            $table->json('slug');
            $table->json('description')->nullable();
            $table->json('constraints')->nullable();
            $table->string('image')->nullable();
            $table->integer('order_column')->default(0);
            $table->boolean('is_published')->default(true);
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('sectors'); }
};
<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
    public function up(): void {
        Schema::create('commitments', function (Blueprint $table) {
            $table->id();
            $table->json('title');
            $table->json('description')->nullable();
            $table->string('icon')->nullable();
            $table->integer('order_column')->default(0);
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('commitments'); }
};
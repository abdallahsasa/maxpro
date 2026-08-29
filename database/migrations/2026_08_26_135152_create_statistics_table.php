<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
    public function up(): void {
        Schema::create('statistics', function (Blueprint $table) {
            $table->id();
            $table->string('type'); 
            $table->string('year')->nullable();
            $table->string('value');
            $table->json('label');
            $table->integer('order_column')->default(0);
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('statistics'); }
};
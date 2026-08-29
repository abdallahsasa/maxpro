<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
    public function up(): void {
        Schema::create('quote_requests', function (Blueprint $table) {
            $table->id();
            $table->string('company_name');
            $table->string('contact_name');
            $table->string('email');
            $table->string('phone');
            $table->string('project_location');
            $table->string('project_type');
            $table->string('approximate_surface_area')->nullable();
            $table->string('expected_start_date')->nullable();
            $table->text('project_description');
            $table->string('status')->default('New'); 
            $table->ipAddress('ip_address')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('quote_requests'); }
};
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('testimonials', function (Blueprint $table) {
            $table->id();
            $table->string('client_name');
            $table->string('client_role')->nullable();
            $table->string('client_company')->nullable();
            $table->string('client_avatar')->nullable();
            $table->integer('rating')->default(5);
            $table->text('testimonial')->nullable();
            $table->boolean('is_active')->default(true);
            $table->integer('order_number')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('testimonials');
    }
};

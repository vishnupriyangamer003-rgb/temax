<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('title');
            $table->string('icon')->nullable();
            $table->string('image')->nullable();
            $table->text('summary')->nullable();
            $table->string('badge')->nullable();
            $table->string('banner')->nullable();
            $table->string('items_title')->nullable();
            $table->string('cta_title')->nullable();
            $table->text('lead')->nullable();
            $table->json('intro')->nullable();
            $table->json('points')->nullable();
            $table->string('image_a')->nullable();
            $table->string('image_b')->nullable();
            $table->unsignedInteger('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        Schema::create('service_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('service_id')->constrained()->cascadeOnDelete();
            $table->string('icon')->nullable();
            $table->string('title');
            $table->text('text')->nullable();
            $table->unsignedInteger('sort_order')->default(0);
            $table->timestamps();
        });

        Schema::create('service_steps', function (Blueprint $table) {
            $table->id();
            $table->foreignId('service_id')->constrained()->cascadeOnDelete();
            $table->string('title');
            $table->text('text')->nullable();
            $table->unsignedInteger('sort_order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('service_steps');
        Schema::dropIfExists('service_items');
        Schema::dropIfExists('services');
    }
};

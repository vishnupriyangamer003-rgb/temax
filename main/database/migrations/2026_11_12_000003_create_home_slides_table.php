<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('home_slides', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('highlight')->nullable();
            $table->text('text')->nullable();
            $table->string('image');
            $table->string('button_text')->nullable();
            $table->string('button_url')->nullable();
            $table->unsignedInteger('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        $now = now();
        DB::table('home_slides')->insert([
            ['title' => 'See', 'highlight' => 'Inside Your Furnace', 'text' => 'Live, continuous furnace viewing — TEMAX camera systems built for cement, thermal and glass plants since 1996.', 'image' => 'assets/images/temax/kiln-camera.jpg', 'button_text' => 'Read More', 'button_url' => '/services', 'sort_order' => 0, 'is_active' => true, 'created_at' => $now, 'updated_at' => $now],
            ['title' => 'Cooling &', 'highlight' => 'Retraction Systems', 'text' => 'SS 316 cooling and pneumatic auto retraction protect camera and operator in environments up to 2000 °C.', 'image' => 'assets/images/temax/dispatch.jpg', 'button_text' => 'Read More', 'button_url' => '/products', 'sort_order' => 1, 'is_active' => true, 'created_at' => $now, 'updated_at' => $now],
            ['title' => 'Thermal', 'highlight' => 'Kiln Shell Monitoring', 'text' => 'Temperature-reading thermal cameras track hot spots and coating loss across the entire kiln length.', 'image' => 'assets/images/temax/thermal-camera.jpg', 'button_text' => 'Read More', 'button_url' => '/projects', 'sort_order' => 2, 'is_active' => true, 'created_at' => $now, 'updated_at' => $now],
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('home_slides');
    }
};

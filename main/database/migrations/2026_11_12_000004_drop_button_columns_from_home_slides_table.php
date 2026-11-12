<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        foreach (['button_text', 'button_url'] as $column) {
            if (Schema::hasColumn('home_slides', $column)) {
                Schema::table('home_slides', function (Blueprint $table) use ($column) {
                    $table->dropColumn($column);
                });
            }
        }
    }

    public function down(): void
    {
        Schema::table('home_slides', function (Blueprint $table) {
            $table->string('button_text')->nullable();
            $table->string('button_url')->nullable();
        });
    }
};

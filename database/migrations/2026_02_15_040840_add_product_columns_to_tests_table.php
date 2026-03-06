<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('tests', function (Blueprint $table) {
            // 既存データがあっても落ちないように nullable or default を付ける
            $table->unsignedInteger('price')->default(0)->after('name');
            $table->text('description')->nullable()->after('price');
            $table->unsignedInteger('stock')->default(0)->after('description');
            $table->string('image_path')->nullable()->after('stock');
        });
    }

    public function down(): void
    {
        Schema::table('tests', function (Blueprint $table) {
            $table->dropColumn(['price', 'description', 'stock', 'image_path']);
        });
    }
};

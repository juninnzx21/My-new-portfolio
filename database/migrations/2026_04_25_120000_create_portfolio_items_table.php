<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('portfolio_items', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('eyebrow');
            $table->string('title');
            $table->string('image_path', 2048);
            $table->string('live_url', 2048);
            $table->string('details_url', 2048);
            $table->unsignedInteger('display_order')->default(0);
            $table->boolean('is_visible')->default(true);
            $table->timestamps();
        });

        $defaults = collect(config('portfolio.defaults', []))
            ->map(function (array $item) {
                return [
                    ...$item,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            })
            ->all();

        if ($defaults !== []) {
            DB::table('portfolio_items')->insert($defaults);
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('portfolio_items');
    }
};

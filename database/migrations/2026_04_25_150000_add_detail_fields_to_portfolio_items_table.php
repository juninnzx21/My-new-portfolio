<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('portfolio_items', function (Blueprint $table) {
            $table->string('detail_category')->nullable()->after('details_url');
            $table->string('detail_client')->nullable()->after('detail_category');
            $table->string('detail_project_date')->nullable()->after('detail_client');
            $table->string('detail_heading')->nullable()->after('detail_project_date');
            $table->longText('detail_body')->nullable()->after('detail_heading');
            $table->json('detail_images')->nullable()->after('detail_body');
        });
    }

    public function down(): void
    {
        Schema::table('portfolio_items', function (Blueprint $table) {
            $table->dropColumn([
                'detail_category',
                'detail_client',
                'detail_project_date',
                'detail_heading',
                'detail_body',
                'detail_images',
            ]);
        });
    }
};

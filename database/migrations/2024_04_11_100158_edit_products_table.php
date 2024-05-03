<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            // $table->string('code')->after('slug');
            // $table->foreignId('hsn_id')->nullable()->after('code')->constrained()->onDelete('SET NULL');
            // $table->foreignId('color_id')->nullable()->after('hsn_id')->constrained()->onDelete('SET NULL');
            // $table->longText('attributes')->nullable()->after('color_id');
            // $table->string('sku')->nullable()->after('code');
            // $table->string('dimenstions')->nullable()->after('attributes');
            // $table->string('is_assembly')->nullable()->after('dimenstions');
            // $table->string('material')->nullable()->after('is_assembly');
            // $table->enum('is_deals', ['y', 'n'])->default('n')->after('material');
            // $table->enum('is_popular', ['y', 'n'])->default('n')->after('is_deals');

            $table->string('color_ids')->after('color_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            //
        });
    }
};

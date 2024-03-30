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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('image')->comment('1024')->nullable();
            $table->string('md_image')->comment('256')->nullable();
            $table->string('thumb_image')->comment('128')->nullable();
            $table->foreignId('category_id')->constrained()->onDelete('CASCADE');
            $table->longText('specification')->comment('json')->nullable();
            $table->longText('general_information')->comment('json')->nullable();
            $table->longText('description')->comment('json')->nullable();
            $table->string('seo_title')->nullable();
            $table->string('seo_keywords')->nullable();
            $table->string('seo_description')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};

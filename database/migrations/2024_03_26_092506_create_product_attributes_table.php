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
        Schema::create('product_attributes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained()->onDelete('CASCADE');
            $table->string('size')->default('Free Size');
            $table->double('price')->comment('inr')->nullable();
            $table->double('discount')->comment('in %')->nullable();
            $table->double('trade_price')->comment('inr')->nullable();
            $table->double('price_usd')->comment('inr')->nullable();
            $table->double('discount_usd')->comment('in %')->nullable();
            $table->double('trade_price_usd')->comment('inr')->nullable();
            $table->enum('is_default', [0, 1])->default(0);
            $table->timestamps();

            $table->unique([
                'product_id',
                'size'
            ]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_attributes');
    }
};

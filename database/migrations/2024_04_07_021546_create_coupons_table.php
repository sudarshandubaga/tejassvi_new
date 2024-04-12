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
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->double('min_cart_total')->default(0);
            $table->enum('discount_type', ['percent', 'flat'])->default('percent');
            $table->double('discount_amount')->nullable();
            $table->double('discount_percent')->nullable();
            $table->date('valid_from')->nullable();
            $table->date('valid_upto')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coupons');
    }
};

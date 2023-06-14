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
        Schema::create('tb_products', function (Blueprint $table) {
            $table->id('product_id');
            $table->string('product_name');
            $table->text('category');
            $table->string('unit');
            $table->integer('in_stock');
            $table->integer('on_order');
            $table->string('image');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_products');
    }
};

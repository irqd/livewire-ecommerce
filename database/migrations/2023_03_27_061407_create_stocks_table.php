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
        Schema::create('stocks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->references('id')->on('products')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->string('name');
            $table->integer('quantity');
            $table->float('original_price');
            $table->float('selling_price');
            $table->string('status')->default('1')->comment('0 for Inactive, 1 for Active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stocks');
    }
};

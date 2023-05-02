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
        Schema::create('wishlist', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('products_id')->references('id')->on('products')->constrained()->onDelete('cascade')->onUpdate('cascade');
            // $table->foreignId('stocks_id')->references('id')->on('stocks')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('user_id')->references('id')->on('users')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });

        Schema::create('wishlist_stock', function (Blueprint $table) {
            $table->id();
            $table->foreignId('wishlist_id')->references('id')->on('wishlist')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('stocks_id')->references('id')->on('stocks')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->integer('quantity')->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wishlist');
        Schema::dropIfExists('wishlist_stock');
    }
};

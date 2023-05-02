<?php

use App\Models\User;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('shopping_cart', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });

        Schema::create('shopping_cart_stock', function (Blueprint $table) {
            $table->id();
            $table->foreignId('shopping_cart_id')->references('id')->on('shopping_cart')->constrained()->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('shopping_cart');
        Schema::dropIfExists('shopping_cart_stock');
    }
};

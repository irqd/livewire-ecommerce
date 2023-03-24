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
            $table->foreignId('brand_id')->references('id')->on('brands')->onDelete('cascade');
            $table->foreignId('category_id')->references('id')->on('categories')->onDelete('cascade');
            //$table->foreignId('stocks_id'); dapat nasa stock table yng foreign key
            //$table->foreignId('images_id')->nullable(); dapat nasa image table yng foreign key
            $table->string('name');
            $table->longText('description')->nullable();
            $table->float('original_price');
            $table->float('selling_price');
            $table->string('status')->default('1')->comment('0 for Inactive, 1 for Active');
            $table->string('featured')->default('0')->comment('0 for No, 1 for Yes');
            $table->string('meta_name');
            $table->string('meta_keyword');
            $table->mediumText('meta_description')->nullable();


            
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

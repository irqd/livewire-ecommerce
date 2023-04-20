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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            
            $table->string('name');
            $table->string('slug');
            $table->longText('description')->nullable();
            $table->string('image')->nullable();
            
            $table->string('meta_name');
            $table->string('meta_keyword');

            $table->mediumText('meta_description')->nullable();
            
            $table->boolean('status')->default(1)->comment('0 for Inactive, 1 for Active');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};

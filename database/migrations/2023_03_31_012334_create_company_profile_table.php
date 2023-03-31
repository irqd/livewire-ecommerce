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
        Schema::create('company_profile', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('document_id')->references('id')->on('company_documents')->onDelete('cascade')->onUpdate('cascade');
            // $table->foreignId('social_id')->references('id')->on('company_socials')->onDelete('cascade')->onUpdate('cascade');

            $table->string('name');
            $table->string('logo');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('company_profile');
    }
};

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
        Schema::create('product',function(Blueprint $table){
            $table->id();
            $table->string('name')->required();
            $table->string('price')->required();
            $table->string('old_price')->nullable();
            $table->integer('reviews_count')->nullable();
            $table->integer('category')->required();
            $table->mediumText('description')->nullable();
            $table->longText('features')->nullable();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product');
    }
};

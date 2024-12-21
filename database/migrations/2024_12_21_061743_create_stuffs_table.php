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
        Schema::create('stuffs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('discount_id');
            $table->unsignedBigInteger('tax_id');
            $table->string('name_stuff');
            $table->integer('stock');
            $table->integer('price');
            $table->timestamps();

            $table->foreign('tax_id')->references('id')->on('taxes')->onDelete('restrict');
            $table->foreign('discount_id')->references('id')->on('discounts')->onDelete('restrict');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stuffs');
    }
};

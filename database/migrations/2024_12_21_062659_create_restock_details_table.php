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
        Schema::create('restock_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('restock_id');
            $table->unsignedBigInteger('stuff_id');
            $table->integer('stuff_total');
            $table->integer('cost_unit');
            $table->timestamps();

            $table->foreign('restock_id')->references('id')->on('restocks')->onDelete('cascade');
            $table->foreign('stuff_id')->references('id')->on('stuffs')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('restock_details');
    }
};

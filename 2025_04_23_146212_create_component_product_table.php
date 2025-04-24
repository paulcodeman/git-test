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
        Schema::create('component_product', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('node_component_id')->index();
            $table->foreign('node_component_id')->references('id')->on('node_components');
            $table->bigInteger('product_id')->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('component_product');
    }
};

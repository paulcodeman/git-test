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
        Schema::create('calculation_nodes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('node_category_id')->index();
            $table->foreign('node_category_id')->references('id')->on('node_categories');
            $table->string('title');
            $table->text('description')->nullable();
            $table->boolean('is_active');
            $table->integer('order')->default(1);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('calculation_nodes');
    }
};

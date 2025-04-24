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
        Schema::create('node_parameters', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('calculation_node_id')->index();
            $table->foreign('calculation_node_id')->references('id')->on('calculation_nodes');
            $table->string('key')->unique();
            $table->string('title');
            $table->bigInteger('unit_id')->index();
            $table->foreign('unit_id')->references('id')->on('units');
            $table->double('range_from')->nullable();
            $table->double('range_to')->nullable();
            $table->json('value_list')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('node_parameters');
    }
};

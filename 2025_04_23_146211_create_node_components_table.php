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
        Schema::create('node_components', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('calculation_node_id')->unsigned()->index();
            $table->foreign('calculation_node_id')->references('id')->on('calculation_nodes')->onDelete('cascade');
            $table->bigInteger('component_purpose_id')->unsigned()->index(); // Добавлен столбец
            $table->foreign('component_purpose_id')->references('id')->on('component_purposes')->onDelete('cascade');
            $table->bigInteger('component_role_id')->unsigned()->index(); // Добавлен столбец
            $table->foreign('component_role_id')->references('id')->on('component_roles')->onDelete('cascade');
            $table->bigInteger('component_source_id')->unsigned()->index(); // Добавлен столбец
            $table->foreign('component_source_id')->references('id')->on('component_sources')->onDelete('cascade');
            $table->string('consumption_key')->unique();
            $table->double('consumption');
            $table->string('reserve_key')->unique();
            $table->double('reserve');
            $table->bigInteger('unit_id')->unsigned()->index();
            $table->foreign('unit_id')->references('id')->on('units')->onDelete('cascade');
            $table->integer('rounding_id')->unsigned();
            $table->foreign('rounding_id')->references('id')->on('roundings')->onDelete('cascade');
            $table->boolean('use_material_consumption')->default(false);
            $table->text('formula');
            $table->boolean('allow_disable');
            $table->boolean('allow_duplicate');
            $table->text('link')->nullable();
            $table->text('note')->nullable();
            $table->json('external_products')->nullable();
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
        Schema::dropIfExists('node_components');
    }
};

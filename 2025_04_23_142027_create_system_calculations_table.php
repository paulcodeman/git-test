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
        Schema::create('system_calculations', function (Blueprint $table) {
            $table->id();
            $table->boolean('is_active');
            $table->string('title');
            $table->bigInteger('system_id')->index();
            $table->foreign('system_id')->references('id')->on('systems');
            $table->bigInteger('company_id')->index();
            $table->foreign('company_id')->references('id')->on('companies');
            $table->bigInteger('user_id')->index();
            $table->foreign('user_id')->references('id')->on('users');
            $table->bigInteger('calculation_node_id')->index();
            $table->foreign('calculation_node_id')->references('id')->on('calculation_nodes');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('system_calculations');
    }
};

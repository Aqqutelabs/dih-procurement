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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('user_id')->constrained()->nullable();
            $table->foreignId('category_id')->constrained()->nullable();
            $table->text('description')->nullable();
            $table->json('document')->nullable();
            $table->integer('quantity')->nullable();
            $table->integer('unit_price')->nullable();
            $table->string('packaging_type')->nullable();
            $table->string('lead_time')->nullable();
            $table->string('delivery_mode')->nullable();
            $table->string('supply_region')->nullable();
            $table->boolean('accept_terms')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};

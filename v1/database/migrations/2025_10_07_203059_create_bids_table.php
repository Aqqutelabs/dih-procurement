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
        Schema::create('bids', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->nullable();
            $table->string('buyer_name')->nullable();
            $table->foreignId('tender_id')->constrained()->nullable();
            $table->foreignId('category_id')->constrained()->nullable();
            $table->integer('amount')->nullable();
            $table->string('delivery_location')->nullable();
            $table->string('delivery_date')->nullable();
            $table->text('note')->nullable();
            $table->json('document')->nullable();
            $table->integer('quantity')->nullable();
            $table->integer('unit_price')->nullable();
            $table->enum('status', ['Under Review', 'Accepted', 'Rejected'])->default('Under Review');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bids');
    }
};

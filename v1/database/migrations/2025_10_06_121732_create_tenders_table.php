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
        Schema::create('tenders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->string('grade')->nullable();
            $table->integer('quantity')->nullable();
            $table->integer('unit')->nullable();
            $table->integer('value')->nullable();
            $table->string('commodity_type')->nullable();
            $table->string('currency')->nullable();
            $table->string('quality_standard')->nullable();
            $table->date('delivery_start_date')->nullable();
            $table->date('delivery_end_date')->nullable();
            $table->date('publish_date')->nullable();
            $table->date('opening_date')->nullable();
            $table->date('closing_date')->nullable();
            $table->date('bip_deadline')->nullable();
            $table->string('timezone')->nullable();
            $table->json('document')->nullable();
            $table->boolean('cross_border_tender')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tenders');
    }
};

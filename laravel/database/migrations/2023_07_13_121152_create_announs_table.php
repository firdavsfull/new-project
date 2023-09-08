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
        Schema::create('announs', function (Blueprint $table) {
            $table->id();
            $table->string('deal_type')->nullable();
            $table->string('type_real_estate')->nullable();
            $table->integer('city_id')->nullable();
            $table->integer('floor')->nullable();
            $table->integer('floor_in_house')->nullable();
            $table->string('year_of_construction')->nullable();
            $table->integer('quantity_room')->nullable();
            $table->string('total_area')->nullable();
            $table->string('living_area')->nullable();
            $table->integer('kitchen_area')->nullable();
            $table->text('link_video')->nullable();
            $table->string('parking')->nullable();
            $table->boolean('elevator')->default(1);
            $table->boolean('Balcony')->default(0);
            $table->integer('number_of_rent')->nullable();
            $table->string('rental period')->nullable();
            $table->string('repair')->nullable();
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->integer('price')->nullable();
            $table->string('rental_type')->nullable();
            $table->string('prepayment')->default('нет');
            $table->string('house_type')->nullable();
            $table->string('type_object')->nullable();
            $table->string('layout')->nullable();
            $table->integer('owner_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('announs');
    }
};

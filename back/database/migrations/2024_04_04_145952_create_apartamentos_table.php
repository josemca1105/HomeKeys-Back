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
        Schema::create('apartamentos', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code')->unique();
            $table->string('floor');
            $table->string('p_supply');
            $table->string('elevator');
            $table->string('address');
            $table->string('city');
            $table->string('state');
            $table->string('description');
            $table->string('price');
            $table->string('n_rooms');
            $table->string('n_baths');
            $table->string('n_parking');
            $table->string('type');
            $table->string('meters');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('apartamentos');
    }
};

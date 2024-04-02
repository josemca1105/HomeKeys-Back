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
        Schema::create('casas', function (Blueprint $table) {
            $table->id();
            $table->uuid('code')->default(Str::uuid());
            $table->string('address');
            $table->string('price');
            $table->string('description');
            $table->string('type');
            $table->string('n_rooms');
            $table->string('n_baths');
            $table->string('n_parking');
            $table->string('meters');
            $table->string('image_1');
            $table->string('image_2');
            $table->string('image_3');
            $table->string('image_4');
            $table->string('image_5');
            $table->string('image_6')->nullable();
            $table->string('image_7')->nullable();
            $table->string('image_8')->nullable();
            $table->string('image_9')->nullable();
            $table->string('image_10')->nullable();
            $table->string('image_11')->nullable();
            $table->string('image_12')->nullable();
            $table->string('image_13')->nullable();
            $table->string('image_14')->nullable();
            $table->string('image_15')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('casas');
    }
};

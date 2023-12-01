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
        Schema::create('crypto_currencies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('crypto_id')->unique();
            $table->integer('rank');
            $table->string('name');
            $table->string('symbol');
            $table->decimal('price', $precision = 8, $scale = 2);
            $table->unsignedDecimal('percent_change_15m', $precision = 8, $scale = 2);
            $table->boolean('isEdited')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('crypto_currencies');
    }
};

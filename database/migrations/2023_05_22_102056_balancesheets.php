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
        Schema::create('balancesheets', function (Blueprint $table) {
            $table->id();
            $table->BigInteger('transaction_id');
            $table->foreignId('user_id');
            $table->string('transaction_type');
            $table->string('transaction_name');
            $table->BigInteger('product_price')->length(50);
            $table->timestamps();
    });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('balancesheets');
    }
};

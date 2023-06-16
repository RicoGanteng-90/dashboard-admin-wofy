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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('number', 50);
            $table->string('email', 50);
            $table->string('method', 50);
            $table->string('address', 100);
            $table->string('total_products', 100);
            $table->integer('total_price');
            $table->dateTime('order_time')->useCurrent();
            $table->dateTime('event_time');
            $table->string('order_status')->nullable();
            $table->string('proof_payment')->nullable();
            $table->string('payment_status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('stripe_payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable(); // user li dayer payment
            $table->unsignedBigInteger('order_id')->nullable(); // ila مربوط ب order
            $table->string('stripe_payment_id')->unique(); // id li jay mn stripe
            $table->string('stripe_intent_id')->nullable(); // payment intent
            $table->decimal('amount', 10, 2); // montant dial payment
            $table->string('currency', 10)->default('usd');
            $table->enum('status', ['pending','succeeded','failed'])->default('pending');
            $table->json('response')->nullable(); // n7tto response kamla mn stripe
            $table->timestamps();

            // foreign keys
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('stripe_payments');
    }
};

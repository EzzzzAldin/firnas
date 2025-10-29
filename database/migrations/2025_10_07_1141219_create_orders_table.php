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
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('set null');
            $table->foreignId('product_id')->nullable()->constrained()->onDelete('set null');
            $table->string('product_name')->nullable();
            $table->decimal('price', 10, 2)->nullable();
            $table->string('currency', 10)->default('USD');
            $table->string('payment_status')->default('Pending');
            $table->string('payment_transaction_id')->nullable();
            $table->string('payment_method')->nullable();
            $table->string('customer_email')->nullable();
            $table->string('customer_mobile')->nullable();
            $table->string('customer_name')->nullable();
            $table->json('questions')->nullable(); // الاسئله اللي يجب ان يدخلها المستخدم

            $table->string('order_reference')->nullable();
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

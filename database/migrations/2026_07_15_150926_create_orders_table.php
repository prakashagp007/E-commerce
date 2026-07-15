<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
// create_orders_table
public function up()
{
    Schema::create('orders', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained()->onDelete('cascade');
        $table->decimal('total_amount', 10, 2);
        $table->enum('payment_method', ['cod', 'upi', 'razorpay']);
        $table->enum('payment_status', ['pending', 'paid', 'failed'])->default('pending');
        $table->enum('order_status', ['processing', 'shipped', 'delivered', 'cancelled'])->default('processing');
        $table->string('name');
        $table->string('phone');
        $table->text('address');
        $table->string('city');
        $table->string('pincode');
        $table->string('upi_transaction_id')->nullable(); // UPI reference
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

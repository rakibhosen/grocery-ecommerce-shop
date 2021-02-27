<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user_id')->nullable();
            $table->string('payment_name')->nullable();
            $table->string('name')->nullable();
            $table->string('phone')->nullable();
            $table->text('shipping_address');
            $table->string('email')->nullable();
            $table->string('order_number')->nullable();
            $table->text('message')->nullable();
            $table->boolean('is_paid')->default(0);
            $table->boolean('is_seen_by_admin')->default(0);
            $table->boolean('is_completed')->default(0);
            $table->string('transaction_id')->nullable();
    
    $table->integer('product_quantity')->default(1);
        
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}

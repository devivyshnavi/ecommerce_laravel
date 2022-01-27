<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_orders', function (Blueprint $table) {
            $table->id();
            $table->string('orderId');
            $table->string("email");
            $table->string('product_name');
            $table->string('product_image');
            $table->integer('product_price');
            $table->string('product_quantity');
            $table->string('coupon_code')->nullable();
            $table->integer('amount');
            $table->integer('paidAmount');
            $table->string("payment_mode");
            $table->string("status")->default("pending");
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
        Schema::dropIfExists('user_orders');
    }
}

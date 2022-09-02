<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keys_awaiting_payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId("order_id")->constrained("orders")->onUpdate("Cascade")->onDelete("Cascade");
            $table->foreignId("product_id")->constrained("products")->onUpdate("Cascade")->onDelete("Cascade");
            $table->string("key");
            $table->double("key_price",8,2);
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
        Schema::dropIfExists('keys_awaiting_payments');
    }
};

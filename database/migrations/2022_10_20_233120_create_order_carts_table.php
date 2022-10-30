<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(){
        Schema::create('order_carts', function (Blueprint $table) {
            $table->id();
            $table->integer('cart_id');
            $table->integer('order_id');
            $table->string('user_id')->nullable();
            $table->integer('product_id');
            $table->timestamps();
        });
    }

    public function down(){
        Schema::dropIfExists('order_carts');
    }
};

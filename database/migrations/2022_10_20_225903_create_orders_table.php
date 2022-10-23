<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(){
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('tracking_number');
            $table->integer('total')->default(0);
            $table->integer('total_shipping')->default(0);
            $table->integer('user_id')->nullable();
            $table->string('name')->default('Name not provided');
            $table->string('phone_number')->default('Phone Number');
            $table->string('email')->default('Default User Email');
            $table->string('address')->default('Default Address');
            $table->text('order_notes')->nullable();
            $table->string('status')->default('pending');
            $table->timestamps();
        });
    }

    public function down(){
        Schema::dropIfExists('orders');
    }
};

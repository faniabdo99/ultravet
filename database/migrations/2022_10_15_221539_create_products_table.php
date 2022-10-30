<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(){
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->string('status');
            $table->string('image');
            $table->string('sku')->nullable();
            $table->text('description');
            $table->integer('price');
            $table->text('content');
            $table->integer('qty');
            $table->integer('brand_id');
            $table->integer('category_id');
            $table->integer('pet_id');
            $table->integer('user_id');
            $table->integer('discount_id')->nullable();
            $table->integer('is_featured')->default(0);
            $table->timestamps();
        });
    }

    public function down(){
        Schema::dropIfExists('products');
    }
};

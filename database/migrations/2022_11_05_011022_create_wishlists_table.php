<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('wishlists', function (Blueprint $table) {
            $table->id();
            $table->string('user_id'); // String because we may store a guest_id here
            $table->integer('product_id');
            $table->timestamps();
            $table->softDeletes();
        });
    }
    public function down() {
        Schema::dropIfExists('wishlists');
    }
};

<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->boolean('is_featured')->default(false);
            $table->integer('order_num')->default(1);
            $table->integer('parent_id')->nullable();
            $table->integer('user_id');
            $table->timestamps();
        });
    }
    public function down() {
        Schema::dropIfExists('categories');
    }
};

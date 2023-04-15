<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {

    public function up() {
        Schema::create('product_variations', function (Blueprint $table) {
            $table->id();
            $table->string('label');
            $table->string('value');
            $table->integer('product_id');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('product_variations');
    }
};

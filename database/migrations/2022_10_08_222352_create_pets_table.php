<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{
    public function up(){
        Schema::create('pets', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->string('image');
            $table->integer('user_id');
            $table->timestamps();
        });
    }
    public function down(){
        Schema::dropIfExists('pets');
    }
};

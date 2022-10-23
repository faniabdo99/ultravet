<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{
    public function up(){
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('image')->nullable();
            $table->integer('user_id');
            $table->text('description');
            $table->text('content');
            $table->timestamps();
        });
    }
    public function down(){
        Schema::dropIfExists('articles');
    }
};

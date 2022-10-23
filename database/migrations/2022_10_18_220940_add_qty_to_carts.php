<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(){
        Schema::table('carts', function (Blueprint $table) {
            $table->integer('qty')->default(1);
        });
    }

    public function down(){
        Schema::table('carts', function (Blueprint $table) {
            $table->dropColumn('qty');
        });
    }
};

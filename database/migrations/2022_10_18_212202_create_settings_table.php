<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(){
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->float('lb_usd_exchange_rate');
            $table->timestamps();
        });
    }
    public function down(){
        Schema::dropIfExists('settings');
    }
};

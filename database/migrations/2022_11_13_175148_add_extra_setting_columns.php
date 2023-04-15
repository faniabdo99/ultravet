<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->string('email')->nullable();
            $table->string('phone_number')->nullable();
            $table->integer('happy_clients')->nullable();
            $table->integer('years')->nullable();
            $table->integer('brands')->nullable();
            $table->integer('products')->nullable();
            $table->string('description')->nullable();
            $table->string('address')->nullable();
            // Working hours
            $table->string('working_hours_label_1')->nullable();
            $table->string('working_hours_label_2')->nullable();
            $table->string('working_hours_label_3')->nullable();
            $table->string('working_hours_value_1')->nullable();
            $table->string('working_hours_value_2')->nullable();
            $table->string('working_hours_value_3')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('settings', function (Blueprint $table) {
            //
        });
    }
};

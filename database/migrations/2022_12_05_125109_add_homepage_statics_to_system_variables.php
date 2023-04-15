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
            $table->string('homepage_slogan')->nullable();
            $table->string('homepage_header')->nullable();
            $table->string('homepage_description')->nullable();
            $table->string('card_one_icon')->nullable();
            $table->string('card_one_title')->nullable();
            $table->string('card_one_description')->nullable();
            $table->string('card_two_icon')->nullable();
            $table->string('card_two_title')->nullable();
            $table->string('card_two_description')->nullable();
            $table->string('card_three_icon')->nullable();
            $table->string('card_three_title')->nullable();
            $table->string('card_three_description')->nullable();
            $table->string('card_four_icon')->nullable();
            $table->string('card_four_title')->nullable();
            $table->string('card_four_description')->nullable();
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
            $table->dropColumn('homepage_slogan');
            $table->dropColumn('homepage_header');
            $table->dropColumn('homepage_description');
            $table->dropColumn('card_one_icon');
            $table->dropColumn('card_one_title');
            $table->dropColumn('card_one_description');
            $table->dropColumn('card_two_icon');
            $table->dropColumn('card_two_title');
            $table->dropColumn('card_two_description');
            $table->dropColumn('card_three_icon');
            $table->dropColumn('card_three_title');
            $table->dropColumn('card_three_description');
            $table->dropColumn('card_four_icon');
            $table->dropColumn('card_four_title');
            $table->dropColumn('card_four_description');
        });
    }
};

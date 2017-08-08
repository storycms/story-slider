<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSliderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sliders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('user_id');
            $table->timestamps();
        });

        Schema::create('sliders_items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('slider_id')->unsigned();
            $table->smallInteger('order')->default(0);
            $table->boolean('status')->default(false);
            $table->string('image')->nullable();
            $table->string('image_mobile')->nullable();
            $table->timestamps();
        });

        Schema::create('trans_sliders_items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('slider_item_id');
            $table->string('title')->nullable();
            $table->text('subtitle')->nullable();
            $table->text('content')->nullable();
            $table->char('locale', 2)->default('en');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trans_sliders_items');
        Schema::dropIfExists('sliders_items');
        Schema::dropIfExists('sliders');
    }
}

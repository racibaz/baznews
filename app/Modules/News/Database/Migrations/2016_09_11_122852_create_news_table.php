<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('country_id')->nullable();
            $table->unsignedInteger('city_id')->nullable();
            $table->unsignedInteger('news_resource_id')->nullable();
            $table->string('title')->unique();
            $table->string('small_title')->nullable();
            $table->string('slug')->nullable();
            $table->text('spot');
            $table->text('content');
            $table->text('description')->nullable();
            $table->string('keywords')->nullable();
            $table->text('meta_tags')->nullable();
            $table->string('cuff_photo')->nullable();
            $table->text('thumbnail')->nullable();
            $table->string('video_embed')->nullable();
            $table->unsignedBigInteger('news_type')->nullable()->default(0);
            $table->string('map_text')->nullable();
            $table->unsignedInteger('hit')->nullable();
            $table->unsignedInteger('status')->nullable();
            //$table->enum('choices', array('foo', 'bar'));
            $table->boolean('band_news');
            $table->boolean('box_cuff');
            $table->boolean('is_cuff');
            $table->boolean('break_news');
            $table->boolean('main_cuff');
            $table->boolean('mini_cuff');
            $table->boolean('is_comment');
            $table->boolean('is_active');
            $table->timestamps();

            // Keys
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('set null');
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('set null');
            $table->foreign('news_resource_id')->references('id')->on('news_sources')->onDelete('cascade')->onUpdate('cascade');
        });


        Schema::create('news_categories_news', function (Blueprint $table) {
            $table->unsignedInteger('news_category_id')->index();
            $table->unsignedInteger('news_id')->index();

            $table->foreign('news_category_id')->references('id')->on('news_categories')->onDelete('cascade');
            $table->foreign('news_id')->references('id')->on('news')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
//        Schema::drop('related_news_news');
        Schema::dropIfExists('news_categories_news');
        Schema::dropIfExists('news');
    }
}

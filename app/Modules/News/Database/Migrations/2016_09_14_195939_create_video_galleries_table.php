<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVideoGalleriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('video_galleries', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('video_category_id')->nullable();
            $table->unsignedInteger('user_id');
            $table->string('title');
            $table->string('slug')->nullable();
            $table->string('short_url')->nullable();
            $table->string('description')->nullable();
            $table->string('keywords')->nullable();
            $table->string('thumbnail')->nullable();
            $table->boolean('is_cuff')->default(0);
            $table->boolean('is_active');
            $table->timestamps();

            // Keys
            $table->foreign('video_category_id')->references('id')->on('video_categories')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::create('news_video_galleries', function (Blueprint $table) {
            $table->unsignedInteger('video_gallery_id')->index();
            $table->unsignedInteger('news_id')->index();

            $table->foreign('video_gallery_id')->references('id')->on('video_galleries')->onDelete('cascade');
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
        Schema::dropIfExists('news_video_galleries');
        Schema::dropIfExists('video_galleries');
    }
}

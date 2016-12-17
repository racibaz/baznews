<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('video_gallery_id')->nullable();
            $table->string('name')->nullable();
            $table->string('slug')->nullable();
            $table->string('subtitle')->nullable();
            $table->text('thumbnail')->nullable();
            $table->string('link')->nullable();
            $table->text('content')->nullable();
            $table->string('keywords')->nullable();
            $table->unsignedInteger('order')->nullable();
            $table->boolean('is_active')->nullable();
            $table->timestamps();

            // Keys
            $table->foreign('video_gallery_id')->references('id')->on('video_galleries')->onDelete('set null')->onUpdate('set null');
        });

        Schema::create('news_videos', function (Blueprint $table) {
            $table->unsignedInteger('video_id')->index();
            $table->unsignedInteger('news_id')->index();

            $table->foreign('video_id')->references('id')->on('videos')->onDelete('cascade');
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
        Schema::dropIfExists('news_videos');
        Schema::dropIfExists('videos');
    }
}

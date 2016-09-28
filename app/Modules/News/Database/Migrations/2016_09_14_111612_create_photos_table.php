<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photos', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('photo_gallery_id')->nullable();
            $table->string('name')->nullable();
            $table->string('slug')->nullable();
            $table->string('subtitle')->nullable();
            $table->text('file')->nullable();
            $table->string('link')->nullable();
            $table->text('content')->nullable();
            $table->string('keywords')->nullable();
            $table->unsignedInteger('order')->nullable();
            $table->boolean('is_active')->nullable();
            $table->timestamps();

            // Keys
            $table->foreign('photo_gallery_id')->references('id')->on('photo_galleries')->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::create('news_photos', function (Blueprint $table) {
            $table->unsignedInteger('photo_id')->index();
            $table->unsignedInteger('news_id')->index();

            $table->foreign('photo_id')->references('id')->on('photos')->onDelete('cascade');
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
        Schema::drop('news_photos');
        Schema::drop('photos');
    }
}

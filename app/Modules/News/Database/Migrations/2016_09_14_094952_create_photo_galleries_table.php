<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhotoGalleriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photo_galleries', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('photo_category_id')->nullable();
            $table->unsignedInteger('user_id');
            $table->string('title');
            $table->string('slug')->nullable();
            $table->string('description')->nullable();
            $table->string('keywords')->nullable();
            $table->boolean('is_cuff')->default(0);
            $table->boolean('is_active');
            $table->timestamps();

            // Keys
            $table->foreign('photo_category_id')->references('id')->on('photo_categories')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });


        Schema::create('news_photo_galleries', function (Blueprint $table) {
            $table->unsignedInteger('photo_gallery_id')->index();
            $table->unsignedInteger('news_id')->index();

            $table->foreign('photo_gallery_id')->references('id')->on('photo_galleries')->onDelete('cascade');
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
        Schema::dropIfExists('news_photo_galleries');
        Schema::dropIfExists('photo_galleries');
    }
}

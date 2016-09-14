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
            $table->boolean('is_active');
            $table->timestamps();

            // Keys
            $table->foreign('photo_category_id')->references('id')->on('photo_categories')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('photo_galleries');
    }
}

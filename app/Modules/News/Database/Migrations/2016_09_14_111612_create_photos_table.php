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
            $table->text('file')->nullable();
            $table->string('link')->nullable();
            $table->text('description')->nullable();
            $table->string('keywords')->nullable();
            $table->unsignedInteger('order')->nullable();
            $table->boolean('is_active')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('photos');
    }
}

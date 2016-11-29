<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->string('name');
            $table->string('slug')->nullable();
            $table->string('link')->nullable();
            $table->string('thumbnail')->nullable();
            $table->string('photo')->nullable();
            $table->string('author')->nullable();
            $table->string('publisher')->nullable();
            $table->string('description')->nullable();
            $table->string('ISBN')->nullable();
            $table->string('release_date')->nullable();
            $table->string('number_of_print')->nullable();
            $table->string('skin_type')->nullable();
            $table->string('paper_type')->nullable();
            $table->string('size')->nullable();
            $table->boolean('is_cuff');
            $table->boolean('is_active');
            $table->timestamps();

            //keys
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
        Schema::dropIfExists('books');
    }
}

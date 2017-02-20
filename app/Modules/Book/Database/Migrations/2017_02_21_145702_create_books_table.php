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
            $table->unsignedInteger('publisher_id')->nullable();
            $table->string('name');
            $table->string('slug')->nullable()->unique();
            $table->string('link')->nullable();
            $table->string('thumbnail')->nullable();
            $table->string('photo')->nullable();
            $table->string('author')->nullable();
            $table->text('description')->nullable();
            $table->string('ISBN')->nullable();
            $table->string('release_date')->nullable();
            $table->string('number_of_print')->nullable();
            $table->string('skin_type')->nullable();
            $table->string('paper_type')->nullable();
            $table->string('size')->nullable();
            $table->boolean('is_cuff');
            $table->boolean('is_active');
            $table->timestamps();
            $table->softDeletes();

            //keys
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('publisher_id')->references('id')->on('publishers')->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::create('book_categories_books', function (Blueprint $table) {
            $table->unsignedInteger('book_category_id')->index();
            $table->unsignedInteger('book_id')->index();

            $table->foreign('book_category_id')->references('id')->on('book_categories')->onDelete('cascade');
            $table->foreign('book_id')->references('id')->on('books')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('book_categories_books');
        Schema::dropIfExists('books');
    }
}

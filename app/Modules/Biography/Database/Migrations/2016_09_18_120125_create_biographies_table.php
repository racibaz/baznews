<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBiographiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('biographies', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->string('title')->unique();
            $table->text('spot')->nullable();
            $table->string('name')->unique();
            $table->string('slug')->nullable();
            $table->string('short_url')->nullable();
            $table->text('content')->nullable();
            $table->string('photo')->nullable();
            $table->string('description')->nullable();
            $table->string('keywords')->nullable();
            $table->unsignedInteger('hit')->default(0);
            $table->unsignedInteger('order')->default(0);
            $table->boolean('status')->default(false);
            $table->boolean('is_cuff')->default(false);
            $table->boolean('is_active')->default(false);
            $table->timestamps();

            // Keys
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
        Schema::dropIfExists('biographies');
    }
}

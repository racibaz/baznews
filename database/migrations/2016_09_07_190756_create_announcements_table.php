<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnnouncementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('announcements', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->string('title');
            $table->string('description')->nullable();
            $table->integer('order')->nullable();
            $table->boolean('is_active');
            $table->dateTime('show_time')->nullable();
            $table->timestamps();
        });

        Schema::create('announcement_group', function (Blueprint $table) {
            $table->unsignedInteger('announcement_id')->index();
            $table->unsignedInteger('group_id')->index();

            $table->foreign('announcement_id')->references('id')->on('announcements')->onDelete('cascade');
            $table->foreign('group_id')->references('id')->on('groups')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('announcement_group');
        Schema::drop('announcements');
    }
}

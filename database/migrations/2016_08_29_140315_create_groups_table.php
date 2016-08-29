<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('groups', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('description')->nullable();
            $table->boolean('is_active');
            $table->timestamps();
        });

        Schema::create('group_user', function (Blueprint $table) {
            $table->unsignedInteger('group_id')->index();
            $table->unsignedInteger('user_id')->index();

            $table->foreign('group_id')->references('id')->on('groups')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::create('group_role', function (Blueprint $table) {
            $table->unsignedInteger('group_id')->index();
            $table->unsignedInteger('role_id')->index();

            $table->foreign('group_id')->references('id')->on('groups')->onDelete('cascade');
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('group_role');
        Schema::drop('group_user');
        Schema::drop('groups');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSearchListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('search_lists', function (Blueprint $table) {
            $table->increments('id');
            $table->string('class_path');
            $table->string('field');
            $table->string('module_slug')->nullable();
            $table->string('route_name')->nullable();
            $table->boolean('is_require_slug')->default(false);
            $table->boolean('is_active')->default(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('search_lists');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Kalnoy\Nestedset\NestedSet;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->increments('id');
            NestedSet::columns($table);
            $table->unsignedInteger('page_id')->nullable();
            $table->string('name')->unique();
            $table->string('slug')->nullable();
            $table->string('url')->nullable();
            $table->string('route')->nullable();
            $table->string('target')->nullable();
            $table->string('icon')->nullable();
            $table->string('order')->nullable();
            $table->boolean('is_header')->nullable();
            $table->boolean('is_footer')->nullable();
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
        Schema::dropIfExists('menus');
    }
}

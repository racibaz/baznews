<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWidgetManagersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('widget_managers', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('widget_group_id');
            $table->string('name')->unique();
            $table->string('slug')->unique();
            $table->string('namespace');
            $table->smallInteger('position')->nullable();
            $table->boolean('is_active');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('widget_group_id')->references('id')->on('widget_groups')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('widget_managers');
    }
}

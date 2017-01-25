<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('contact_type_id');
            $table->string('full_name');
            $table->string('subject');
            $table->text('content');
            $table->string('email');
            $table->string('phone')->nullable();
            $table->ipAddress('IP');
            $table->unsignedTinyInteger('status')->nullable();
            $table->boolean('is_read');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contacts');
    }
}

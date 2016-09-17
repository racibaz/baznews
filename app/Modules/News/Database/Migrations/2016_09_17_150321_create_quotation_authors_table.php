<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuotationAuthorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotation_authors', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->string('name')->unique();
            $table->string('slug')->nullable();
            $table->string('email')->nullable();
            $table->string('cv')->nullable();
            $table->string('photo')->nullable();
            $table->string('description')->nullable();
            $table->string('keywords')->nullable();
            $table->boolean('is_cuff')->default(false);
            $table->boolean('is_active')->default(false);
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
        Schema::dropIfExists('quotation_authors');
    }
}

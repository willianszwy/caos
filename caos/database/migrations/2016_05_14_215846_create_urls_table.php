<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUrlsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('urls', function (Blueprint $table) {
         $table->increments('id');
         $table->integer('hits')->unsigned()->default(0);
         $table->string('url');
         $table->string('shortUrl');
         $table->string('user_id');
     });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('urls');
    }
}

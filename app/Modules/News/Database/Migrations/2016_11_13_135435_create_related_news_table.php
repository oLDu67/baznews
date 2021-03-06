<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRelatedNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('related_news', function (Blueprint $table) {

            $table->increments('id');
            $table->unsignedInteger('news_id')->index();
            $table->unsignedInteger('related_news_id')->index();

            // Keys
            $table->foreign('news_id')->references('id')->on('news')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('related_news_id')->references('id')->on('news')->onDelete('cascade')->onUpdate('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('related_news');
    }
}

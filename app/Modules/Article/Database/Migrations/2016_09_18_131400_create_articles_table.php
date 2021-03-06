<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('article_author_id');
            $table->string('title')->nullable()->unique();
            $table->string('slug')->nullable()->unique();
            $table->string('short_url')->nullable();
            $table->string('subtitle')->nullable();
            $table->string('spot')->nullable();
            $table->text('content')->nullable();
            $table->string('description')->nullable();
            $table->string('keywords')->nullable();
            $table->unsignedInteger('order')->default(0);
            $table->unsignedTinyInteger('status')->default(0);
            $table->boolean('is_cuff')->default(false);
            $table->boolean('is_comment')->default(false);
            $table->boolean('is_active')->default(false);
            $table->timestamps();
            $table->softDeletes();

            // Keys
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('article_author_id')->references('id')->on('article_authors')->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::create('article_categories_articles', function (Blueprint $table) {
            $table->unsignedInteger('article_category_id')->index();
            $table->unsignedInteger('article_id')->index();

            $table->foreign('article_category_id')->references('id')->on('article_categories')->onDelete('cascade');
            $table->foreign('article_id')->references('id')->on('articles')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('article_categories_articles');
        Schema::dropIfExists('articles');
    }
}

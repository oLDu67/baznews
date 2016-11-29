<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Kalnoy\Nestedset\NestedSet;

class CreateVideoCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('video_categories', function (Blueprint $table) {
            $table->increments('id');
            NestedSet::columns($table);
            $table->string('name')->unique();
            $table->string('slug')->nullable();
            $table->string('description')->nullable();
            $table->string('keywords')->nullable();
            $table->unsignedInteger('hit')->nullable();
            $table->string('icon')->nullable();
            $table->boolean('is_cuff');
            $table->boolean('is_active');
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
        Schema::dropIfExists('video_categories');
    }
}

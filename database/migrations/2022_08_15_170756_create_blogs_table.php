<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->text('overview')->nullable();
            $table->string('category')->nullable();
            $table->text('content')->nullable();
            $table->text('tags')->nullable();
            $table->text('slug')->nullable();
            $table->string('thumbnail')->nullable();
            $table->integer('user_id')->nullable();
            $table->tinyInteger('active')->nullable();
            $table->tinyInteger('deleted')->nullable();
            $table->integer('created_by');
            $table->integer('updated_by');
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
        Schema::dropIfExists('blogs');
    }
}

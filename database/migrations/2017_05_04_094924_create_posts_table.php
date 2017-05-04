<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table("posts", function($table){
            $table->create();
            $table->increments('id');
            $table->integer('sub_cat_id')->unsigned();
            $table->string('temp_post_id');
            $table->string('title', 255);
            $table->string('slug', 255);
            $table->text('description');
            $table->string('image', 255);
            $table->timestamps();
            $table->foreign('sub_cat_id')->references('id')->on('categoryitems')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}

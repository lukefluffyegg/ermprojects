<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryitemsTable extends Migration
{
/**
     * Make changes to the database.
     *
     * @return void
     */
    public function up()
    {
        //

        Schema::table("categoryitems", function($table){
            $table->create();
            $table->increments('id');
            $table->integer('parent_id')->unsigned();
            $table->string('name', 255);
            $table->string('slug', 255);
            $table->text('description');
            $table->string('image', 255);
            $table->timestamps();
            $table->foreign('parent_id')->references('id')->on('categories')->onDelete('cascade');

        });

    }

    /**
     * Revert the changes to the database.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::drop("categoryitems");
    }

}

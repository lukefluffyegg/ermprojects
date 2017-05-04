<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
/**
     * Make changes to the database.
     *
     * @return void
     */
    public function up()
    {
        //

        Schema::table("categories", function($table){
            $table->create();
            $table->increments('id');
            $table->string('name', 255);
            $table->string('slug', 255);
            $table->text('description');
            $table->string('image', 255);
            $table->timestamps();
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
        Schema::drop("categories");
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDressCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dress_categories', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('dress_id')->unsigned();
            $table->bigInteger('category_id')->unsigned();
            $table->foreign('dress_id')->references('id')->on('dresses')->onUpdate('cascade')->onDelete('cascade'); 
            $table->foreign('category_id')->references('id')->on('categories')->onUpdate('cascade')->onDelete('cascade'); 
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
        Schema::dropIfExists('dress_categories');
    }
}

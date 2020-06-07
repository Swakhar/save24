<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('mainid')->nullable();
            $table->integer('subid')->nullable();
            $table->string('role');
            $table->string('name');
            $table->string('slug');
            $table->string('feature_image')->nullable();
            $table->integer('featured')->nullable();
            $table->integer('status')->nullable();
            $table->integer('sub_status')->nullable();
            $table->integer('child_status')->nullable();
            $table->integer('menu_status')->nullable();
            $table->integer('sub_menu_status')->nullable();
            $table->integer('child_menu_status')->nullable();
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
        Schema::dropIfExists('categories');
    }
}

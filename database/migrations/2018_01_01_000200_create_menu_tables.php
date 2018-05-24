<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenuTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('location')->nullable()->default(null);
        });

        Schema::create('menu_entries', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order');
            $table->string('slug');
            $table->string('text');
            $table->string('icon');
            $table->string('title');
            $table->string('aria-label');
            $table->timestamps();

            $table->integer('entry_id')->unsigned()->nullable()->default(null);
            $table->foreign('entry_id')->references('id')->on('entries');

            $table->integer('menu_id')->unsigned()->nullable()->default(null);
            $table->foreign('menu_id')->references('id')->on('menus');

            $table->unique( ['slug', 'menu_id'] );
        });

        Schema::table('menu_entries', function (Blueprint $table) {
            $table->integer('parent_id')->unsigned()->nullable()->default(null);
            $table->foreign('parent_id')->references('id')->on('menu_entries');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('menus');
        Schema::drop('menu_entries');
    }
}

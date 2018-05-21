<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntryTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('entry_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
        });

        Schema::table('entry_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
        });

        Schema::create('entries', function (Blueprint $table) {
            $table->increments('id');
            $table->longText('content');

            $table->integer('entry_type_id')->unsigned()->nullable()->default(null);
            $table->foreign('entry_type_id')->references('id')->on('entry_types');

            $table->integer('entry_category_id')->unsigned()->nullable()->default(null);
            $table->foreign('entry_category_id')->references('id')->on('entry_categories');

            $table->integer('author')->unsigned()->nullable()->default(null);
            $table->foreign('author')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('entries');
        Schema::drop('entry_categories');
        Schema::drop('entry_types');
    }
}

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
        Schema::create('entry_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug')->unqiue();
            $table->string('name');
            $table->dateTime('created_at');
            $table->dateTime('updated_at');
        });

        // TODO: Many-to-many relationship
        Schema::create('entry_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug')->unqiue();
            $table->string('name');
            $table->dateTime('created_at');
            $table->dateTime('updated_at');
        });

        Schema::create('entries', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');

            $table->string('css_id')->nullable()->default(null);
            $table->string('css_classlist')->nullable()->default(null);

            $table->integer('entry_type_id')->unsigned()->nullable()->default(null);
            $table->foreign('entry_type_id')->references('id')->on('entry_types');

            // TODO: Many-to-many relationship
            $table->integer('entry_category_id')->unsigned()->nullable()->default(null);
            $table->foreign('entry_category_id')->references('id')->on('entry_categories');

            $table->integer('author_id')->unsigned()->nullable()->default(null);
            $table->foreign('author_id')->references('id')->on('users');

            $table->dateTime('created_at');
            $table->dateTime('updated_at');
        });

        Schema::create('entry_content_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('icon');
            $table->string('css_classlist')->nullable()->default(null);
            $table->string('html_tag_open');
            $table->string('html_tag_close')->nullable()->default(null);
            $table->dateTime('created_at');
            $table->dateTime('updated_at');
        });

        Schema::create('entry_content_type_attributes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('html_attribute');
            $table->boolean('required');

            $table->integer('entry_content_type_id')->unsigned();
            $table->foreign('entry_content_type_id')->references('id')->on('entry_content_types');
            $table->dateTime('created_at');
            $table->dateTime('updated_at');
        });

        Schema::create('entry_contents', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order')->unsigned();
            $table->string('css_id')->nullable()->default(null);
            $table->string('css_classlist')->nullable()->default(null);
            $table->mediumText('html_content')->nullable()->default(null);
            $table->dateTime('created_at');
            $table->dateTime('updated_at');
        });

        Schema::table('entry_contents', function (Blueprint $table) {
            $table->integer('entry_id')->unsigned();
            $table->foreign('entry_id')->references('id')->on('entries');

            $table->integer('entry_content_type_id')->unsigned();
            $table->foreign('entry_content_type_id')->references('id')->on('entry_content_types');

            $table->integer('background_image_id')->unsigned()->nullable()->default(null);
            $table->foreign('background_image_id')->references('id')->on('images');

            $table->integer('parent_id')->unsigned()->nullable()->default(null);
            $table->foreign('parent_id')->references('id')->on('entry_contents');
        });

        Schema::create('entry_content_attributes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('value')->nullable()->default(null);

            $table->integer('entry_content_id')->unsigned();
            $table->foreign('entry_content_id')->references('id')->on('entry_contents');

            $table->integer('entry_content_type_attribute_id')->unsigned();
            $table->foreign('entry_content_type_attribute_id')->references('id')->on('entry_content_type_attributes');

            // For links (a tags)
            $table->integer('entry_id')->unsigned()->nullable()->default(null);
            $table->foreign('entry_id')->references('id')->on('entries');

            // For images (img tags)
            $table->integer('image_id')->unsigned()->nullable()->default(null);
            $table->foreign('image_id')->references('id')->on('images');

            $table->dateTime('created_at');
            $table->dateTime('updated_at');
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

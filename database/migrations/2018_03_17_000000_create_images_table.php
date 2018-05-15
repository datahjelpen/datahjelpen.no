<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->increments('id');
            $table->string('url');
            $table->string('size_width');
            $table->string('size_height');
            $table->string('size_name');
            $table->string('alt_tag');
            $table->timestamps();
        });

        // Avatar
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedInteger('image_id')->nullable()->default(null);
            $table->foreign('image_id')->references('id')->on('images');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('images');
    }
}

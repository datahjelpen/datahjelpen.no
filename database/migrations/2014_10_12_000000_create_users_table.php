<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            // Default
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone')->nullable()->default(null);
            $table->string('password')->nullable()->default(null);
            $table->rememberToken();
            $table->dateTime('created_at');
            $table->dateTime('updated_at');
            $table->string('company')->nullable()->default(null);
            $table->string('company_nr')->nullable()->default(null);

            // Email verification
            $table->boolean('verified')->default(false);
            $table->string('email_token')->nullable()->default(null);

            // GDPR
            $table->boolean('agree_tos')->default(false);
            $table->dateTime('agree_tos_latest')->nullable()->default(null);
            $table->boolean('agree_privacy')->default(false);
            $table->dateTime('agree_privacy_latest')->nullable()->default(null);
            $table->boolean('agree_dpa')->default(false);
            $table->dateTime('agree_dpa_latest')->nullable()->default(null);
            $table->boolean('delete')->default(false);

            // Extra security
            $table->integer('failed_attempts')->default(0);
            $table->dateTime('last_login')->nullable();
            $table->boolean('enabled_2fa')->default(false);
            $table->text('secret_2fa')->nullable()->default(null);
            $table->string('confirmation_code')->nullable()->default(null);
            $table->datetime('confirmation_code_valid_until')->nullable()->default(null);

            // Socialite
            $table->string('provider')->nullable()->default(null);
            $table->string('provider_id')->nullable()->default(null);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('firstname');
            $table->string('lastname');
            $table->string('password');
            $table->string('email')->unique();

            $table->string('genre')->nullable();
            $table->string('country')->nullable();
            $table->string('city')->nullable();
            $table->string('avatar')->nullable();
            $table->string('phone')->nullable();

            $table->string('identity_card')->nullable();
            $table->string('confirmation_token')->nullable();

            $table->string('google_id')->nullable();
            $table->string('facebook_id')->nullable();

            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('google')->nullable();
            $table->string('linkedin')->nullable();

            $table->string('paypal_name')->nullable();
            $table->string('paypal_email')->nullable();

            $table->string('bank_address_1')->nullable();
            $table->string('bank_address_2')->nullable();
            $table->string('bank_postal_code')->nullable();
            $table->string('bank_city')->nullable();
            $table->string('bank_owner')->nullable();
            $table->string('bank_iban')->nullable();

            $table->timestamp('birthday')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamp('phone_verified_at')->nullable();
            $table->timestamp('last_connexion')->nullable();

            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}

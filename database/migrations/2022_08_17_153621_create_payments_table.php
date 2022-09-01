<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->integer('paymentable_id');
            $table->string('paymentable_type');
            $table->string('payment_method');
            $table->integer('amount');
            $table->integer('net_amount');
            $table->integer('taxe')->nullable();
            $table->string('client_email')->nullable();
            $table->string('full_name');
            $table->string('street');
            $table->string('city');
            $table->string('postal_code');
            $table->string('country_code');
            $table->string('currency_code');
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
        Schema::dropIfExists('payments');
    }
}

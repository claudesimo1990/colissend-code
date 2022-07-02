<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('reservations_id')->constrained('reservations');
            $table->string('payment_id');
            $table->string('payment_method');
            $table->string('amount');
            $table->string('paypal_fee');
            $table->string('net_amount');
            $table->string('paypal_client_email')->nullable();
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
        Schema::dropIfExists('transactions');
    }
}

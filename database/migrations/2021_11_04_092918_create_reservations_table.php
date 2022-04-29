<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration
{
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('post_id')->references('id')->on('posts')->onDelete('cascade');;
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');;
            $table->text('message')->nullable();
            $table->text('kilo')->nullable();
            $table->string('price')->nullable();
            $table->enum('status', ['PROGRESS', 'ACCEPTED', 'REJECTED']);
            $table->boolean('paid')->default(false);
            $table->longText('objects')->nullable();
            $table->longText('billing_infos')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('reservations');
    }
}

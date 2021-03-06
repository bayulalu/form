<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotifsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('subject');
            $table->BigInteger('seen');
            $table->BigInteger('hel');
            $table->unsignedBigInteger('form_id')->unsigned();
            $table->unsignedBigInteger('user_id')->unsigned();
            $table->timestamps();

            $table->foreign('form_id')->references('id')->on('forms');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notifs');
    }
}

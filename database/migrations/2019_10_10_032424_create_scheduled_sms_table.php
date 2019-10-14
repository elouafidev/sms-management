<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScheduledSmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scheduled_sms', function (Blueprint $table) {
            $table->increments('id');
            $table->string('phone_number');
            $table->text('sms_content');
            $table->integer('day');
            $table->time('time');
            $table->boolean('repeat');
            $table->bigInteger('CreatorID')->unsigned();
            $table->dateTime('sent_at')->nullable();
            $table->timestamps();

            $table->foreign('CreatorID')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('scheduled_sms');
    }
}

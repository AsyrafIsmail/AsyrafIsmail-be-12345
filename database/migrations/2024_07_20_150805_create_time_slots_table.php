<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTimeSlotsTable extends Migration
{
    public function up()
    {
        Schema::create('time_slots', function (Blueprint $table) {
            $table->id();
            $table->string('theater_name');
            $table->dateTime('start_time');
            $table->dateTime('end_time');
            $table->string('title');
            $table->string('duration');
            $table->string('views');
            $table->string('genre');
            $table->string('poster');
            $table->float('overall_rating');
            $table->integer('theater_room_no');
            $table->text('description');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('time_slots');
    }
}

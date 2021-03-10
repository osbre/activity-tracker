<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivitiesTable extends Migration
{
    public function up()
    {
        Schema::create('activities', function (Blueprint $table) {
            $table->id();
            $table->string('type');

            $table->dateTime('start');
            $table->dateTime('finish');
            $table->time('time_spent');

            $table->unsignedInteger('distance');
            $table->unsignedInteger('speed');
        });
    }

    public function down()
    {
        Schema::dropIfExists('activities');
    }
}

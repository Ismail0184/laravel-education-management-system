<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('room', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('building_id')->unsigned()->index()->foreignId('building_id')->constrained('building');
            $table->integer('branch_id')->unsigned()->index()->foreignId('branch_id')->constrained('branch');
            $table->integer('classes_id')->unsigned()->index()->foreignId('classes_id')->constrained('classes');
            $table->integer('teacher_id')->unsigned()->index()->foreignId('teacher_id')->constrained('teacher');
            $table->integer('user_id')->unsigned()->index()->foreignId('user_id')->constrained('users');
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
        Schema::dropIfExists('room');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNegranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('negran', function (Blueprint $table) {
            $table->id();
            $table->integer('teacher_id')->unsigned()->index()->foreignId('teacher_id')->constrained('teacher');
            $table->integer('classes_id')->unsigned()->index()->foreignId('classes_id')->constrained('classes_id');
            $table->integer('branch_id')->unsigned()->index()->foreignId('branch_id')->constrained('branch');
            $table->integer('room_id')->unsigned()->index()->foreignId('room_id')->constrained('room');
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
        Schema::dropIfExists('negran');
    }
}

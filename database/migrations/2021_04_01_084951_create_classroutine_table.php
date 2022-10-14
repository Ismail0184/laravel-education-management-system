<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassroutineTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classroutine', function (Blueprint $table) {
            $table->id();
            $table->integer('classes_id')->unsigned()->index()->foreignId('classes_id')->constrained('classes');
            $table->integer('subject_id')->unsigned()->index()->foreignId('subject_id')->constrained('subject');
            $table->integer('ghanta_id')->unsigned()->index()->foreignId('ghanta_id')->constrained('ghanta');
            $table->integer('dayname_id')->unsigned()->index()->foreignId('dayname_id')->constrained('dayname');
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
        Schema::dropIfExists('classroutine');
    }
}

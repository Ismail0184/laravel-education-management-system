<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMumtahinTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mumtahin', function (Blueprint $table) {
            $table->id();
            $table->string('nesab', 100)->nullable();
            $table->date('last_date')->nullable();
            $table->integer('teacher_id')->unsigned()->index()->foreignId('teacher_id')->constrained('teacher');
            $table->integer('classes_id')->unsigned()->index()->foreignId('classes_id')->constrained('classes');
            $table->integer('subject_id')->unsigned()->index()->foreignId('subject_id')->constrained('subject');
            $table->integer('examname_id')->unsigned()->index()->foreignId('examname_id')->constrained('examname');
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
        Schema::dropIfExists('mumtahin');
    }
}

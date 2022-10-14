<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResultTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('result', function (Blueprint $table) {
            $table->id();
            $table->integer('mark')->nullable();
            $table->tinyint('fail')->nullable();
            $table->integer('grace_mark')->nullable();
            $table->integer('classes_id')->unsigned()->index()->foreignId('classes_id')->constrained('classes');
            $table->integer('subject_id')->unsigned()->index()->foreignId('subject_id')->constrained('subject');
            $table->integer('student_id')->unsigned()->index()->foreignId('student_id')->constrained('admission');
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
        Schema::dropIfExists('result');
    }
}

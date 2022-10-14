<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamroutineTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('examroutine', function (Blueprint $table) {
            $table->id();
            $table->date('exam_date');
            $table->integer('examname_id')->unsigned()->index()->foreignId('examname_id')->constrained('examname');
            $table->integer('classes_id')->unsigned()->index()->foreignId('classes_id')->constrained('classes');
            $table->integer('subject_id')->unsigned()->index()->foreignId('subject_id')->constrained('subject');
            $table->integer('daypart_id')->unsigned()->index()->foreignId('daypart_id')->constrained('daypart');
            $table->integer('dayname_id')->unsigned()->index()->foreignId('dayname_id')->constrained('dayname');
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
        Schema::dropIfExists('examroutine');
    }
}

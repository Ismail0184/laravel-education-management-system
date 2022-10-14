<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAmonthlyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('amonthly', function (Blueprint $table) {
            $table->id();
            $table->integer('teacher_id')->unsigned()->index()->foreignId('teacher_id')->constrained('teacher');
            $table->date('adate')->nullable();
            $table->integer('presence')->nullable();
            $table->integer('absence')->nullable();
            $table->integer('weekend')->nullable();
            $table->integer('leave')->nullable();
            $table->integer('holiday')->nullable();
            $table->integer('month_id')->unsigned()->index()->foreignId('month_id')->constrained('month');
            $table->integer('year_id')->unsigned()->index()->foreignId('year_id')->constrained('year');
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
        Schema::dropIfExists('amonthly');
    }
}

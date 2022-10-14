<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalaryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salary', function (Blueprint $table) {
            $table->id();
            $table->integer('teacher_id')->unsigned()->index()->foreignId('teacher_id')->constrained('teacher');
            $table->date('sdate')->nullable();
            $table->integer('days')->nullable();
            $table->integer('payable_days')->nullable();
            $table->integer('basic')->nullable();
            $table->integer('house_rent')->nullable();
            $table->integer('transport')->nullable();
            $table->integer('medical')->nullable();
            $table->integer('loan')->nullable();
            $table->integer('charge')->nullable();
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
        Schema::dropIfExists('salary');
    }
}

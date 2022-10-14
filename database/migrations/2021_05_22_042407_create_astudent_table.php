<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAstudentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('astudent', function (Blueprint $table) {
            $table->id();
            $table->integer('admission_id')->unsigned()->index()->foreignId('admission_id')->constrained('admission');
            $table->integer('atype_id')->unsigned()->index()->foreignId('atype_id')->constrained('atype');
            $table->integer('amethod_id')->unsigned()->index()->foreignId('amethod_id')->constrained('amethod');
            $table->date('adate')->nullable();
            $table->string('time_in', 30)->nullable();
            $table->string('time_out', 30)->nullable();
            $table->string('note', 200)->nullable();
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
        Schema::dropIfExists('astudent');
    }
}

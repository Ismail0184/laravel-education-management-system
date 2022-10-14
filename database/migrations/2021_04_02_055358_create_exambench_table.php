<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExambenchTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exambench', function (Blueprint $table) {
            $table->id();
            $table->string('name',100)->nullable();
            $table->string('bench_row',30)->nullable();
            $table->string('c1',20)->nullable();
            $table->string('c2',20)->nullable();
            $table->string('c3',20)->nullable();
            $table->integer('examholl_id')->unsigned()->index()->foreignId('examholl_id')->constrained('examholl');
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
        Schema::dropIfExists('exambench');
    }
}

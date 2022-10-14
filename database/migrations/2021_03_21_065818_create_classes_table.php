<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classes', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100)->nullable();
            $table->interger('total_mark')->nullable();
            $table->interger('jjiddan')->nullable();
            $table->interger('jayeed')->nullable();
            $table->interger('mokbul')->nullable();
            $table->integer('division_id')->unsigned()->index()->foreignId('division_id')->constrained('division');
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
        Schema::dropIfExists('classes');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction', function (Blueprint $table) {
            $table->id();
            $table->integer('amount')->nullable();
            $table->date('tdate')->nullable();
            $table->integer('debit_ahead_id')->unsigned()->index()->foreignId('debit_ahead_id')->constrained('ahead');
            $table->integer('credit_ahead_id')->unsigned()->index()->foreignId('debit_ahead_id')->constrained('ahead');
            $table->integer('admission_id')->unsigned()->index()->foreignId('admission_id')->constrained('admission');
            $table->string('note', 200)->nullable();
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
        Schema::dropIfExists('transaction');
    }
}

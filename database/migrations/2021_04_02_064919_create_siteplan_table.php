<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiteplanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siteplan', function (Blueprint $table) {
            $table->id();
            $table->integer('admission_id')->unsigned()->index()->foreignId('admission_id')->constrained('admission');
            $table->integer('exambench_id')->unsigned()->index()->foreignId('exambench_id')->constrained('exambench');
            $table->integer('exambenchside_id')->unsigned()->index()->foreignId('exambenchside_id')->constrained('exambenchside');
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
        Schema::dropIfExists('siteplan');
    }
}

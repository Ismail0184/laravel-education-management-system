<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdmissionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admission', function (Blueprint $table) {
            $table->id();
            $table->integer('roll');
            $table->string('name', 100);
            $table->string('fname', 100);
            $table->string('mname', 100);
            $table->date('dob');
            $table->string('nationality', 30);
            $table->string('mobile', 100);
            $table->string('email', 100)->nullable();;
            $table->string('nid', 100)->nullable();
            $table->string('specialidentity', 60)->nullable();
            $table->string('session', 30)->nullable();
            $table->string('oldornew', 30)->nullable();
            $table->integer('classes_id')->unsigned()->index()->foreignId('classes_id')->constrained('classes');
            $table->integer('branch_id')->unsigned()->index()->foreignId('branch_id')->constrained('branch');
            $table->string('caddress', 100)->nullable();
            $table->integer('union_id')->unsigned()->index()->foreignId('union_id')->constrained('union');
            $table->integer('thana_id')->unsigned()->index()->foreignId('thana_id')->constrained('thana');
            $table->integer('district_id')->unsigned()->index()->foreignId('district_id')->constrained('district');
            $table->string('paddress', 100)->nullable();
            $table->integer('punion_id')->unsigned()->index()->foreignId('punion_id')->constrained('union');
            $table->integer('pthana_id')->unsigned()->index()->foreignId('pthana_id')->constrained('thana');
            $table->integer('pdistrict_id')->unsigned()->index()->foreignId('pdistrict_id')->constrained('district');
            $table->string('madrasha', 100)->nullable();
            $table->integer('pclass_id')->unsigned()->index()->foreignId('pclass_id')->constrained('classes');
            $table->string('classyear', 30)->nullable();
            $table->string('result', 30)->nullable();
            $table->integer('monthlyfee_id')->unsigned()->index()->foreignId('monthlyfee_id')->constrained('monthlyfee_id');
            $table->string('profile_image_name', 100)->nullable();
            $table->string('nid_image_name', 100)->nullable();
            $table->string('birth_image_name', 100)->nullable();
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
        Schema::dropIfExists('admission');
    }
}

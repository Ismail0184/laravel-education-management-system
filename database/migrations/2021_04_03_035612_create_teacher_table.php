<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeacherTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teacher', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('fname', 100);
            $table->string('mname', 100);
            $table->date('dob');
            $table->string('nationality', 30);
            $table->string('mobile', 100);
            $table->string('email', 100)->nullable();
            $table->string('nid', 100)->nullable();
            $table->string('specialidentity', 60)->nullable();
            $table->string('caddress', 100)->nullable();
            $table->string('union_id', 60)->nullable();
            $table->string('thana_id', 60)->nullable();
            $table->string('district_id', 60)->nullable();
            $table->string('paddress', 100)->nullable();
            $table->string('punion_id', 30)->nullable();
            $table->string('pthana_id', 30)->nullable();
            $table->string('pdistrict_id', 30)->nullable();
            $table->string('highest_jamat', 100)->nullable();
            $table->string('highest_madrasha', 30)->nullable();
            $table->string('highest_board', 30)->nullable();
            $table->string('highest_pass_year', 30)->nullable();
            $table->string('hafez_madrasha', 30)->nullable();
            $table->string('hafez_board', 30)->nullable();
            $table->string('hafez_pass_year', 30)->nullable();
            $table->string('qirat_madrasha', 30)->nullable();
            $table->string('qirat_board', 30)->nullable();
            $table->string('qirat_pass_year', 30)->nullable();
            $table->string('ifta_madrasha', 30)->nullable();
            $table->string('ifta_board', 30)->nullable();
            $table->string('ifta_pass_year', 30)->nullable();
            $table->string('adab_madrasha', 30)->nullable();
            $table->string('adab_board', 30)->nullable();
            $table->string('adab_pass_year', 30)->nullable();
            $table->string('other_jamat', 100)->nullable();
            $table->string('other_madrasha', 30)->nullable();
            $table->string('other_board', 30)->nullable();
            $table->string('other_pass_year', 30)->nullable();
            $table->string('job_madrasha', 30)->nullable();
            $table->string('job_negran_jamat', 100)->nullable();
            $table->string('job_kitab', 30)->nullable();
            $table->string('job_experience_year', 30)->nullable();
            $table->string('job_note', 30)->nullable();
            $table->integer('salary')->nullable();
            $table->string('profile_image_name', 100)->nullable();
            $table->string('nid_image_name', 100)->nullable();
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
        Schema::dropIfExists('teacher');
    }
}

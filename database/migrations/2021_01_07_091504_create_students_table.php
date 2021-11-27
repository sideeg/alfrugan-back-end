<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string("phone_number");
            $table->string("name_en")->nullable();
            $table->string("name_ar");
            $table->string("password");
            $table->smallInteger("age");
            $table->string("email")->nullable();
            $table->smallInteger("sex");//0for men 1 for male
            $table->string("country");
            $table->string("state");
            $table->float("rate")->default(0.0);
            $table->string("status_id")->default(1);
            $table->string("novel_id");
            $table->string("qualification_id");
            $table->string("Specialization")->nullable();

            $table->rememberToken();
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
        Schema::dropIfExists('students');
    }
}

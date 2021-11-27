<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComplimentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compliments', function (Blueprint $table) {
            $table->id();
                        //واحد فيم هو الح يكون فاضي لو الطالب هو المبلغ عنه رقم الاستاذ ح يكون فاضي وهكذا
            $table->integer("teacher_id")->nullable();
            $table->integer("student_id")->nullable();
            $table->text("text");
            $table->integer("type");//0 for compliments 1 for notices

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
        Schema::dropIfExists('compliments');
    }
}

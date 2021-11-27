<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSessionReqesterRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('session_reqester_requests', function (Blueprint $table) {
            $table->id();
            //واحد فيم هو الح يكون فاضي لو الطالب هو المقدم رقم الاستاذ ح يكون فاضي وهكذا
            $table->integer("teacher_id")->nullable();
            $table->integer("student_id")->nullable();
            $table->integer("session_id");

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
        Schema::dropIfExists('session_reqester_requests');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sessions', function (Blueprint $table) {
            $table->id();
            $table->string("name_en")->nullable();
            $table->string("name_ar");
            $table->integer("mosque_id")->nullable();
            $table->integer("teacher_id")->nullable();
            $table->integer("session_type_id");
            $table->date("start_date")->nullable();
            $table->date("end_date")->nullable();
            $table->boolean("register_available")->default(true);
            $table->text("brief_en");
            $table->text("brief_ar");

            $table->string("image");//TODO add defult image

            $table->text("reason_registry_suspension")->nullable();
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
        Schema::dropIfExists('sessions');
    }
}

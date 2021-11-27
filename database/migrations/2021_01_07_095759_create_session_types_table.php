<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSessionTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $mytime = Carbon\Carbon::now();
        Schema::create('session_types', function (Blueprint $table) {
            $table->id();
            $table->string("name_en")->nullable();
            $table->string("name_ar")->nullable();

            $table->timestamps();
        });

        DB::table('session_types')->insert(
            array(
                array("id"=>'1',"name_ar"=>"الدورة المفتوحة" ,'name_en'=>"Open session", "created_at" => $mytime->toDateTimeString()),
                array("id"=>'2',"name_ar"=>"الدورة المغلقة" , 'name_en'=>"Close sessions","created_at" => $mytime->toDateTimeString()),
                array("id"=>'3',"name_ar"=>"الدورة الاون لاين" , 'name_en'=>"OnLine session","created_at" => $mytime->toDateTimeString()),
                )
            );

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('session_types');
    }
}

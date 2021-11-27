<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQualificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qualifications', function (Blueprint $table) {
            $table->id();
            $table->string("name_ar");
            $table->string("name_en");

            $table->timestamps();
        });

        $mytime = Carbon\Carbon::now();
        DB::table('qualifications')->insert(
            array(
                array("name_ar"=>"شهادة ثانوية" ,'name_en'=>"secondry Certificate", "created_at" => $mytime->toDateTimeString()),
                array("name_ar"=>"دبلومة" , 'name_en'=>"National Diploma","created_at" => $mytime->toDateTimeString()),
                array("name_ar"=>"بكلاريوس" , 'name_en'=>"Bachelor's Degree","created_at" => $mytime->toDateTimeString()),
                array("name_ar"=>"بكلاريوس الشرف" , 'name_en'=>"Honours Degree","created_at" => $mytime->toDateTimeString()),
                array("name_ar"=>"ماجستير" , 'name_en'=>"Master's Degree","created_at" => $mytime->toDateTimeString()),
                array("name_ar"=>"الدكتوراة" , 'name_en'=>"Doctoral Degree","created_at" => $mytime->toDateTimeString()),


            ));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('qualifications');
    }
}

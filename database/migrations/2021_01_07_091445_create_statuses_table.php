4<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $mytime = Carbon\Carbon::now();
        Schema::create('statuses', function (Blueprint $table) {
            $table->id();
            $table->string("name_en");
            $table->string("name_ar");
            $table->timestamps();
        });

        DB::table('statuses')->insert(
            array(
                array("id"=>'1',"name_ar"=>"جديد" ,'name_en'=>"new", "created_at" => $mytime->toDateTimeString()),
                array("id"=>'2',"name_ar"=>"متاح" , 'name_en'=>"available","created_at" => $mytime->toDateTimeString()),
                array("id"=>'3',"name_ar"=>"مخظور من الادارة" , 'name_en'=>"blocked by admin","created_at" => $mytime->toDateTimeString()),
                array("id"=>'4',"name_ar"=>"محظور للغياب" , 'name_en'=>"blocked for absence","created_at" => $mytime->toDateTimeString()),


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
        Schema::dropIfExists('statuses');
    }
}

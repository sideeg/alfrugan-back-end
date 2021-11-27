<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNovelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('novels', function (Blueprint $table) {
            $table->id();
            $table->string("name_en")->nullable();
            $table->string("name_ar");
            $table->timestamps();
        });

        $mytime = Carbon\Carbon::now();
        DB::table('novels')->insert(
            array(
                array("id"=>'1',"name_ar"=>"حفص عن عاصم" ,'name_en'=>"Hafs an Abu Bakr `Asim", "created_at" => $mytime->toDateTimeString()),
                array("id"=>'2',"name_ar"=>"شعبة عن عاصم" , 'name_en'=>"Ibn `Ayyash an Abu Bakr `Asim","created_at" => $mytime->toDateTimeString()),
                array("id"=>'3',"name_ar"=>"ورش عن نافع" , 'name_en'=>"Warsh an Nafi","created_at" => $mytime->toDateTimeString()),
                array("id"=>'4',"name_ar"=>"قالون عن نافع" , 'name_en'=>"Qalun an Nafi","created_at" => $mytime->toDateTimeString()),
                array("id"=>'5',"name_ar"=>"البزي عن ابن كثير" , 'name_en'=>"al-Bazzi an Ibn Kathir","created_at" => $mytime->toDateTimeString()),
                array("id"=>'6',"name_ar"=>"قنبل عن ابن كثير" , 'name_en'=>"Qunbul an Ibn Kathir","created_at" => $mytime->toDateTimeString()),
                array("id"=>'7',"name_ar"=>"الدوري عن أبي عمرو" ,'name_en'=>"Al-Duri an Abu `Amr al-'Ala'", "created_at" => $mytime->toDateTimeString()),
                array("id"=>'8',"name_ar"=>"السوسي عن أبي عمرو" , 'name_en'=>"","created_at" => $mytime->toDateTimeString()),
                array("id"=>'9',"name_ar"=>"خلف عن حمزة" , 'name_en'=>"Khalaf an Hamzah","created_at" => $mytime->toDateTimeString()),
                array("id"=>'10',"name_ar"=>"ابن ذكوان عن ابن عامر" , 'name_en'=>"Ibn Dhakwan an Ibn `Amir","created_at" => $mytime->toDateTimeString()),
                array("id"=>'11',"name_ar"=>"أبي الحارث عن الكسائي" , 'name_en'=>"Abu'l-Harith an al-Kisa'i","created_at" => $mytime->toDateTimeString()),
                array("id"=>'12',"name_ar"=>"جماز عن أبي جعفر" , 'name_en'=>"Ibn Jamaz an Abu Ja`far","created_at" => $mytime->toDateTimeString()),
                array("id"=>'13',"name_ar"=>"ابن وردان عن أبي جعفر" , 'name_en'=>"Ibn Wardan an Abu Ja`far","created_at" => $mytime->toDateTimeString()),
                array("id"=>'14',"name_ar"=>"إسحاق الوراق عن خلف البزار" , 'name_en'=>"Ishaq an Khalaf al-Bazzar","created_at" => $mytime->toDateTimeString()),
                array("id"=>'15',"name_ar"=>"رويس و روح عن يعقوب الحضرمي" , 'name_en'=>"Ruways an Ya`qub al-Hashimi","created_at" => $mytime->toDateTimeString()),



            ));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('novels');
    }
}

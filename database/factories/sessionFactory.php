<?php

namespace Database\Factories;

use App\Models\mosque;
use App\Models\session;
use App\Models\session_type;
use App\Models\teacher;
use Illuminate\Database\Eloquent\Factories\Factory;

class sessionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = session::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = \Faker\Factory::create('ar_JO');
        $mosques = mosque::pluck('id')->toArray();
        $teachers = teacher::pluck('id')->toArray();
        $session_types = session_type::pluck('id')->toArray();

        //ranging from next week ending in 1 month
        // $first_date = $faker->dateTimeBetween('+1 week', '+1 month');

        // $mytime = strVal(Carbon\Carbon::now());
        return [
            "name_en"=>$this->faker->name,
            "name_ar"=>$faker->name,
            "mosque_id"=>empty($mosques) ? null : $this->faker->optional(0.9, null)->randomElement($mosques),  // 10% chance of null,
            "teacher_id"=>empty($teachers) ? null : $this->faker->optional(0.9, null)->randomElement($teachers),  // 10% chance of null,,
            "session_type_id"=>$this->faker->randomElement($session_types),
            "start_date"=>$this->faker->dateTimeBetween("now","+1 month"),
            "end_date"=>$this->faker->dateTimeBetween("+2month","+3 month"),
            "register_available"=>$this->faker->optional(0.5,True)->randomElement(array(true,false)),
            "brief_ar"=>$faker->text,
            "brief_en"=>$this->faker->text,

            "image"=>$this->faker->imageUrl,//TODO add defult image

            "reason_registry_suspension"=>$this->faker->text,
        ];
    }
}

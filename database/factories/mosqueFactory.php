<?php

namespace Database\Factories;

use App\Models\mosque;
use Illuminate\Database\Eloquent\Factories\Factory;

class mosqueFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = mosque::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "image"=>$this->faker->imageUrl
            ,"name"=>$this->faker->name
            ,"brief_location_description"=>$this->faker->text(15)
            ,"full_location_description"=>$this->faker->text
            // ,"lat"
            // ,"long"
        ];
    }
}

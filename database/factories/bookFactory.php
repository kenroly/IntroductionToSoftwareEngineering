<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class bookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->sentence(4),
            'category_id' => random_int(1,10),
            'auther_id' => random_int(1,10),
            'publisher_id' => random_int(1,10),
            'published_year' => random_int(2015,2021),
            'entry_date' => $this->faker->date(),
            'price' => random_int(100,1000),
            'user_id' => 1,
            'status' => 'Y'
        ];
    }
}

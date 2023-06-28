<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class readerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $gender=['Nam','Nữ'];
        $date = $this->faker->date();
        $name = $this->faker->name;
        return [
            'name' => $name,
            'alias' => build_alias($name),
            'age' => random_int(18,80),
            'gender' => $gender[random_int(0,1)],
            'email' => $this->faker->safeEmail, 
            'phone' => $this->faker->phoneNumber,
            'address' => $this->faker->address,
            // 'type_id' => random_int(1,3),
            'user_id' => 1,
            'register_date' => $date,
            'expired_date' => date('Y-m-d', strtotime($date . ' +6 month')),
        ];
    }
}

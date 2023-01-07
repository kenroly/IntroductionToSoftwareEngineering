<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class userFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => 'Thế Đạt',
            'alias' => build_alias('Thế Đạt'),
            'username' => 'thedat',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'address' => 'HoChiMinh',
            'dob' => '2002-04-10',
            'phone' => '0112233444',
            'degree' => 'Đại học',
            'department' => 'Ban giám đốc',
            'position' => 'Giám đốc',
        ];
    }


}
